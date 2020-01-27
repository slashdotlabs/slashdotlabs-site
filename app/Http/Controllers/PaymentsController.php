<?php

namespace App\Http\Controllers;

use App\Billing\IpayPaymentGateway;
use App\Events\PaymentReceived;
use App\Models\Order;
use App\Models\Payment;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|Response|View
     * @throws Exception
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Payment::latest()->with('customer')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.payments');
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
            if (config('app.env') == 'local') Log::channel('ipay')->debug(['fields_retuned' => $res]);

            // get status state
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
        $is_manual = $request->boolean('manual_payment', false);
        $res = $request->all();
        if($is_manual){
            $validator = $this->validate_manual_payments($res);
            if ($validator->fails()) return \response()->json($validator->errors()->first());
        }
        // ?Check if it's from iPay or if it's a manual payment entry
        $order_id = $is_manual ? $res['order_id'] : $res['id'];
        $payment_details = [
            'payment_type' => $is_manual ? $res['payment_type'] : $res['channel'],
            'amount' => $is_manual ? $res['amount'] : $res['mc'],
            'currency' => 'KES'
        ];

        $order = Order::with('customer')->where('order_id', $order_id)->first();
        $order->update(['paid' => true]);
        $order->save();

        $payment = Payment::updateOrCreate([
            'customer_id' => $order->customer->id,
            'order_id' => $order->order_id,
            'payment_ref' => $is_manual ? $res['payment_ref'] : $res['txncd'],
        ], $payment_details);

        return \response()->json(['payment' => $payment]);
    }

    private function validate_manual_payments($data)
    {
        $rules = [
            'payment_type' => 'required',
            'payment_ref' => 'required',
            'amount' => 'required:digits',
            'order_id' => 'required'
        ];
        $messages = [
            'amount.digits' => 'Enter a valid amount'
        ];
        return Validator::make($data, $rules, $messages);
    }
}
