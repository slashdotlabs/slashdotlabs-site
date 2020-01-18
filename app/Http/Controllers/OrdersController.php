<?php

namespace App\Http\Controllers;

use App\Billing\PaymentGatewayContract;
use App\Models\Order;
use App\Models\OrderItem;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders', ['orders' => $orders]);
        /* TODO: Map Products and Customers */
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */


    /**
     * Save new order with details
     *
     * @param Request $request
     * @param PaymentGatewayContract $paymentGateway
     * @return JsonResponse|Response
     */
    public function store(Request $request, PaymentGatewayContract $paymentGateway)
    {
        try {
            $customer = $request->user();
            $order = new Order($request->only(['total_amount', 'currency']));
            $order->customer()->associate($customer);
            $order_items = collect($request->only('order_items'))->map(function ($order_item) {
                return new OrderItem($order_item);
            });
            // TODO: error processing
            $order->order_items()->saveMany($order_items);
            $order->save();

            // TODO: Create order created event


            // TODO: go to iPay
        } catch (Exception $e) {
            return \response()->withException($e);
        }

        return \response()->json(['ok'=>true]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
