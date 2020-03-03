<?php

namespace App\Providers;

use App\Billing\IpayPaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\Notifications\FailedJobNotification;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //PaymentGateway
        $this->app->singleton(PaymentGatewayContract::class, function ($app) {
            return new IpayPaymentGateway;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // On queue jobs failing
        Queue::failing(function (JobFailed $event) {
            Notification::route('mail', 'ted@slashdotlabs.com')
                ->route('mail', 'technical@slashdotlabs.com')
                ->notify(new FailedJobNotification($event));
        });
    }
}
