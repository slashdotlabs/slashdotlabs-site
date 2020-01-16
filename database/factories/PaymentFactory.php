<?php

/** @var Factory $factory */

use App\Models\Order;
use App\Models\Payment;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

$factory->define(Payment::class, function (Faker $faker) {
    $order = Order::inRandomOrder()->with('customer')->limit(1)->get()->first();
    return [
        'order_id' => $order->order_id,
        'customer_id' => $order->customer->id,
        'payment_type' => $faker->randomElement(['MPESA', 'BANK', 'CREDIT']),
        'payment_ref' => Str::upper(substr($faker->uuid,0,10)),
        'currency' => 'KES',
        'created_at' => \Carbon\Carbon::now(),
    ];
});


$factory->state(Payment::class, 'manual', function (Faker $faker) {
    return [
        'payment_type' => $faker->randomElement(['MPESA', 'BANK', 'CREDIT']),
        'payment_ref' => Str::upper(substr($faker->uuid,0,10)),
        'currency' => 'KES',
        'created_at' => \Carbon\Carbon::now(),
    ];
});

