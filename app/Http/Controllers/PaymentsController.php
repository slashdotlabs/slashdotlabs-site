<?php

namespace App\Http\Controllers;

use App\Billing\IpayPaymentGateway;
use App\Events\PaymentReceived;
use App\Models\Order;
use App\Models\Payment;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Log;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param IpayPaymentGateway $paymentGateway
     * @return RedirectResponse|Redirector
     */
    public function create(IpayPaymentGateway $paymentGateway)
    {
        try {
            $res = request()->all();

            // Log
            Log::channel('ipay')->debug(['fields_retuned' => $res]);

            // get status state TODO: track transactions made in the database
            $status_res = $paymentGateway->get_status_state($res['status']);
            if (!$status_res['process']) throw new Exception($status_res['state']);

            // store payment
            $store_res = $this->store(\request());
            $payment = $store_res->getData(true)['payment'];

            event(new PaymentReceived(Payment::find($payment['id'])));

            // redirect to cart killing sessions
            return redirect('/destroycart')->with(['success' => 'Payment made successfully']);
        } catch (Exception $e) {
            return redirect('/domaincart')->withException($e);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse|Response
     */
    public function store(Request $request)
    {
        $res = $request->all();
        $order = Order::with('customer')->where('order_id',$res['id'])->first();
        $order->update(['paid' => true]);
        $order->save();

        $payment_details = [
            'payment_type' => $res['channel'],
            'amount' => $res['mc'],
            'currency' => 'KES'
        ];

        $payment = Payment::updateOrCreate([
            'customer_id' => $order->customer->id,
            'order_id' => $order->order_id,
            'payment_ref' => $res['txncd'],
        ], $payment_details);

        return \response()->json(['payment' => $payment]);
    }
}
