<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|JsonResponse|View
     */
    public function index()
    {
        $orders = Order::latest()->with(['customer', 'order_items', 'order_items.product'])->get();
        if (request()->ajax()) {
            return response()->json($orders);
        }
        $payment_types = ['MPESA', 'BANK', 'CHEQUE', 'CREDIT'];
        return view('admin.orders', ['orders' => $orders, 'payment_types' => $payment_types]);
    }

    /**
     * Cancel an order
     *
     * @param $order_id
     * @return JsonResponse
     */
    public function cancel($order_id)
    {
        $order = Order::findOrFail($order_id);
        $order->delete();
        return response()->json(['success' => true, 'order' => $order ]);
    }
}
