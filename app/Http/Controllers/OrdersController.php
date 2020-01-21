<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $orders = Order::with(['customer', 'order_items', 'order_items.product'])->get();
        return view('admin.orders', ['orders' => $orders]);
    }
}
