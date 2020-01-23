<?php

namespace App\Listeners;

use App\Events\PaymentReceived;
use App\Notifications\PaymentReceivedNotification;
use Illuminate\Support\Facades\Notification;

class SendPaymentReceivedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PaymentReceived  $event
     * @return void
     */
    public function handle(PaymentReceived $event)
    {
        // Create success message
        session()->put('payment_success', 'Your order has been created and you\'re payment is being processed');

        // Notify vendor
        Notification::route('mail', config('mail.vendor_from.address'))
            ->notify(new PaymentReceivedNotification($event->payment));
    }
}
