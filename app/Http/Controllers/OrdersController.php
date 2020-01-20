<?php

namespace App\Http\Controllers;

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
        $order_items = OrderItem::with(['order', 'order.customer', 'product'])->get();
        return view('admin.orders', ['order_items' => $order_items]);
    }
}
