<?php

namespace App\Providers;

use App\Billing\IpayPaymentGateway;
use App\Billing\PaymentGatewayContract;
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
    }

    /*public function boot()
    {
        //For Older SQL Versions
        Schema::defaultStringLength(191);
    }*/
}
