<?php


namespace App\Events;


use App\Models\Payment;
use Illuminate\Queue\SerializesModels;

class PaymentReceived
{
    use SerializesModels;

    public $payment;

    /**
     * PaymentReceived constructor.
     * @param Payment $payment
     */
    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
    }
}
