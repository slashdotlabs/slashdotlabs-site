<?php

namespace App\Providers;

use App\Events\AdminRegisterUserEvent;
use App\Events\OrderCreated;
use App\Events\PaymentReceived;
use App\Listeners\SendOrderCreatedNotification;
use App\Listeners\SendPaymentReceivedNotification;
use App\Listeners\SendUserCredentialsEmailListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        OrderCreated::class => [
            SendOrderCreatedNotification::class
        ],
        PaymentReceived::class => [
            SendPaymentReceivedNotification::class
        ],
        AdminRegisterUserEvent::class => [
            SendUserCredentialsEmailListener::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
