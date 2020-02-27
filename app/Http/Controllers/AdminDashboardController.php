<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $users = (array) User::getQuery()->selectRaw("count(*) as users")->first();
        $products = (array) Product::getQuery()->selectRaw("count(*) as products")->first();
        $orders = (array) Order::getQuery()->selectRaw("count(*) as orders")->first();
        $counts  = array_merge($users, $products, $orders);

        return view('admin.dashboard', compact(['counts']));
    }
}
