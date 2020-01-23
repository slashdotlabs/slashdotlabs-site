<?php

namespace App\Http\Controllers;

use App\Models\CustomerDomain;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'auth.customer']);
    }

    /**
     * Display dashboard
     *
     * @return View
     */
    public function index()
    {
        $order_items = Order::has('payment')->with('order_items', 'order_items.product')->get()
            ->flatMap(function ($order) {
                return $order->order_items;
            });
        $product_order_items = $order_items->filter(function (OrderItem $order_item) {
            return $order_item->product_type == Product::class;
        })->groupBy('product.product_type');
        $domains_order_items = $order_items->filter(function (OrderItem $order_item) {
            return $order_item->product_type == CustomerDomain::class;
        })->each(function ($domain_order_item) {
            $domain_order_item->product->load('nameservers');
        })->values();

        return view('dashboard.index',
            [
                'user' => Auth::user()->load('customer_biodata'),
                "customer_domains" => $domains_order_items,
                'hosting_packages' => $product_order_items->get('hosting'),
                'ssl_certificates' => $product_order_items->get('ssl_certificates'),
            ]);
    }
}
