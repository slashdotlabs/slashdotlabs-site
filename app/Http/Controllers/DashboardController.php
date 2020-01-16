<?php

namespace App\Http\Controllers;

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
        $user = auth()->user();
        $orders = Order::has('payment')->with('order_items', 'order_items.product')->get();
        $hosting_packages = $orders->flatMap(function ($order) {
            return $order->order_items;
        })->filter(function (OrderItem $order_item) {
            return $order_item->product->product_type == 'hosting';
        })->map(function (OrderItem $hosting_order_item) {
            return [
                'order_id' => $hosting_order_item->order->order_id,
                'package_name' => $hosting_order_item->product->product_name,
                'package_description' => $hosting_order_item->product->product_description,
                'expiry_date' => $hosting_order_item->expiry_date,
                'status' => $hosting_order_item->get_item_status()
            ];
        })->values();

        $id = '';

        $orders = $user->customer_orders;
        foreach ($orders as $order) {
            $id = $order->customer_id;
        }


        $order_id = DB::table('orders')->select('order_id')
            ->where('customer_id', '=', $id)->value('order_id');

        //echo $order_id;


        $order_items = OrderItem::find($order_id);


        return view('dashboard.index',
            [
                "customer_domains" => $user->customer_domains,
                "user" => $user,
                "order_items" => $order_items,
                'hosting_packages' => $hosting_packages
            ]);

    }

}
