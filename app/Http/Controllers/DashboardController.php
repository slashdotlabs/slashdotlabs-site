<?php

namespace App\Http\Controllers;

use App\Models\CustomerDomain;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CustomerBiodata;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display dashboard
     *
     * @return Factory|View
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
        })->values();

        return view('dashboard.index',
            [
                'user' => Auth::user(),
                "customer_domains" => $domains_order_items,
                'hosting_packages' => $product_order_items['hosting'],
                'ssl_certificates' => $product_order_items['ssl_certificate'],
            ]);

    }

}
