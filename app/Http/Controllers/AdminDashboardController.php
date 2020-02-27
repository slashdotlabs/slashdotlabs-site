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
        $counts = [
            'users' => User::count(),
            'products' => Product::count(),
            'orders' => Order::count(),
        ];

        return view('admin.dashboard', compact(['counts']));
    }
}
