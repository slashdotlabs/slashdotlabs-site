<?php


namespace App\Orders;


use App\Models\CustomerBiodata;
use App\Models\CustomerDomain;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use function response;

class OrderHandler
{
    public function store(Collection $data)
    {
        try {
            $customer = \request()->user();
            // Update or create biodata details
            CustomerBiodata::updateOrCreate(
                ['customer_id' => $customer->id],
                [
                    'phone_number' => $data['contact_details']['tel'],
                    'address' => $data['contact_details']['str1'],
                    'city' => $data['contact_details']['city'],
                    'country' => $data['contact_details']['country'],
                    'organization' => $data['contact_details']['org']
                ]);
            $order = new Order($data->get('order_details'));
            $order->customer()->associate($customer);
            $order->save();

            //Get all products
            $products = Product::all();
            $domain_order_items = $data->get('domain_order_items')->map(function ($order_item) use (&$customer, &$products) {
                // Associate product type = Customer domain
                $order_item = collect($order_item);
                $domain_item = new OrderItem($order_item->only(['price', 'currency', 'expiry_date'])->toArray());

                $customer_domain = new CustomerDomain(['domain_name' => $order_item['domain_name']]);
                $customer_domain->customer()->associate($customer);
                $customer_domain_tld = $products->where('product_name', $order_item['domain_tld'])->first();
                $customer_domain->domain_tld()->associate($customer_domain_tld);
                $customer_domain->save();

                $domain_item->product()->associate($customer_domain);
                return $domain_item;
            });
            $hosting_order_items = $data->get('hosting_order_items')->map(function ($order_item) use (&$customer, &$products) {
                // Associate product type = Product
                $order_item = collect($order_item);

                $hosting_item = new OrderItem($order_item->only(['price', 'currency', 'expiry_date'])->toArray());

                $product = $products->filter(function ($product) use (&$order_item) {
                    $db_product_desc = $product->product_name . ' (' . $product->product_description . ')';
                    return $db_product_desc == $order_item['hosting_name'];
                })->first();
                $hosting_item->product()->associate($product);
                return $hosting_item;
            });

            $domain_order_items->merge($hosting_order_items)->each(function (OrderItem $order_item) use (&$order) {
                $order_item->order()->associate($order);
                $order_item->push();
            });

            return response()->json(['order' => $order->load('customer', 'customer.customer_biodata')]);
        } catch (Exception $e) {
            Log::debug($e);
            return response()->json($e, 422);
        }
    }
}
