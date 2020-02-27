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
        $counts = (array) DB::query()
            ->selectSub(User::getQuery()->selectRaw('count(*)'), 'users')
            ->selectSub(Product::getQuery()->selectRaw('count(*)'), 'products')
            ->selectSub(Order::getQuery()->selectRaw('count(*)'), 'orders')
            ->first();
        return view('admin.dashboard', compact(['counts']));
    }
}
