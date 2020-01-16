<?php

namespace App\Http\Controllers;

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
        $this->middleware(['auth','verified']);
    }

    /**
     * Display dashboard
     *
     * @return Factory|View
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $id = '';

        $orders = $user->customer_orders;
        foreach($orders as $order) {
            $id = $order->customer_id;
        }


         $order_id = DB::table('orders')->select('order_id')
                        ->where('customer_id', '=', $id)->value('order_id');

         //echo $order_id;


        $order_items = OrderItem::find($order_id);  


        return view('dashboard.index',
            ["customer_domains"=>$user->customer_domains,
            "user"=>$user,
            "order_items"=>$order_items]);
                                        
    }

}
