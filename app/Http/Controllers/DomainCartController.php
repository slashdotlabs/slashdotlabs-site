<?php

namespace App\Http\Controllers;

use App\Billing\PaymentGatewayContract;
use App\Events\OrderCreated;
use App\Models\Order;
use App\Models\Product;
use App\Orders\OrderHandler;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class DomainCartController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->except('index');
        $this->middleware(['auth.checkout'])->only('index');
    }

    public function index()
    {
        // Send products to display
        $all_products = Product::active()->get();

        //Process to match domaincart entry structure
        // Each entry: domain tld, list of years allowed separated by :, list of prices separated by :
        $domain_products = $all_products->where('product_type', 'domain')->map(function ($domain_product) {
            // Only supports 1 year only for now
            return implode(',', [$domain_product->product_name, 1, $domain_product->price]);
        });

        // Each entry: description,setup,price,S (single charge) or R (monthly recurring charge)
        // Only support Single charge and db price includes setup price
        $hosting_packages = $all_products->where('product_type', 'hosting')->map(function ($hosting_package) {
            $description = $hosting_package->product_name . ' (' . $hosting_package->product_description . ')';
            return implode(',', [$description, 0, $hosting_package->price, 'S']);
        });

        return view('domaincart.index')->with([
            'domain_products' => $domain_products->values()->toArray(),
            'hosting_packages' => $hosting_packages->values()->toArray(),
            'cwaction' => request()->get('cwaction')
        ]);
    }

    public function order_checkout(OrderHandler $orderHandler,  PaymentGatewayContract $paymentGateway)
    {
        session_start();
        $domaincart = collect($_SESSION);
        // cart item entry keys: removed, domain, hostdesc, hostsetup, hostprice, hostrecurr, regtype, regperiod, regprice

        // contact form values
        $domaincart_contact = $domaincart->get('contact_form_values');

        // meta data of cart
        $domaincart_meta = $domaincart->only(['ses_csymbol', 'ses_csymbol2', 'numberofitems', 'numberremoved', 'ipaytotal']);

        //remove meta and recaptcha details then chunk, then reject removed items
        $domaincart_products = $domaincart->except('ipaytotal', 'contact_form_values')->slice(9)->chunk(9)
            ->map(function (Collection $cart_item) {
                return $cart_item->keys()->map(function ($key_string) {
                    return preg_replace('/\d/', '', $key_string);
                })->combine($cart_item->values());
            })->reject(function ($cart_item) {
                return $cart_item['removed'];
            })->values();


        // Create request with order and order details
        $order_details = [
            'order_id' => now()->getTimestamp(),
            'total_amount' => $domaincart_meta['ipaytotal'],
            'currency' => $domaincart_meta['ses_csymbol']
        ];

        // Get domain items only
        $domain_order_items = $domaincart_products->filter(function ($item) {
            return $item['regtype'] == 'R';
        })->map(function ($item) {
            return $this->get_domain_item($item);
        })->map(function ($item) use (&$domaincart_meta) {
            $item['currency'] = $domaincart_meta['ses_csymbol'];
            return $item;
        });;

        // Get hosting items only
        $hosting_order_items = $domaincart_products->filter(function ($item) {
            return $item['regtype'] == 'H' || ($item['regtype'] == 'R' && $item['hostdesc'] != "");
        })->map(function ($item) {
            return $this->get_hosting_item($item);
        })->map(function ($item) use (&$domaincart_meta) {
            $item['currency'] = $domaincart_meta['ses_csymbol'];
            return $item;
        });

        $dataToSend = collect([
            'order_details' => $order_details,
            'domain_order_items' => $domain_order_items,
            'hosting_order_items' => $hosting_order_items,
            'contact_details' => $domaincart_contact
        ]);
        try {
            $created_order_response = $orderHandler->store($dataToSend);
            if ($created_order_response->status() != 200) throw new \Exception('Error processing request. Contact admin');
            $created_order = $created_order_response->getData(true)['order'];

            event(new OrderCreated(Order::where('order_id',$created_order['order_id'])->first()));

            return $paymentGateway->charge([
                'order_id' => $created_order['order_id'],
                'total_amount' => $created_order['total_amount'],
                'phone_number' => $created_order['customer']['customer_biodata']['phone_number'],
                'email' => $created_order['customer']['email']
            ]);
        } catch(\Exception $e) {
            Log::debug($e);
           return back()->withErrors($e->getMessage());
        }
    }

    private function get_domain_item(Collection $item)
    {
        $exploded_domain_name = explode('.', $item['domain']);
        return [
            'price' => $item['regprice'],
            'expiry_date' => Carbon::now()->addYears((int)$item['regperiod']),
            'domain_name' => $item['domain'],
            'domain_tld' => '.' . end($exploded_domain_name)
        ];
    }

    private function get_hosting_item(Collection $item)
    {
        return [
            'price' => $item['hostprice'],
            'expiry_date' => Carbon::now()->addYear(),
            'hosting_name' => $item['hostdesc']
        ];
    }
}
