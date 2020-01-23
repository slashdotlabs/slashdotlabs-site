<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
    	$users = User::all();
    	$products = Product::all();
    	$orders = Order::all();

        return view('admin.dashboard', 
        	[
        		'users' => $users,
        		'products' => $products,
        		'orders' => $orders,
        	]);
    }
}
