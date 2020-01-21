<?php

/** @var Factory $factory */

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'order_id' => $faker->unixTime,
        'currency' => 'KES',
        'total_amount' => 0,
    ];
});

$factory->afterMaking(Order::class, function (Order $order,Faker $faker) {
    // Associate customer
    $customer = User::ofType('customer')->inRandomOrder()->limit(1)->get()->first();
    $order->customer()->associate($customer);
});

