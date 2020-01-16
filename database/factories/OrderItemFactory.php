<?php

/** @var Factory $factory */

use App\Models\CustomerDomain;
use App\Models\OrderItem;
use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(OrderItem::class, function (Faker $faker) {
    return [
        'expiry_date' => \Carbon\Carbon::now()->addYear(),
        'currency' => 'KES'
    ];
});


$factory->state(OrderItem::class, 'domain', function (Faker $faker) {
   $product = \factory(CustomerDomain::class)->make();
   $product->load('domain_tld');
   return [
       'product_id' => $product->id,
       'product_type' => CustomerDomain::class,
       'price' => $product->domain_tld->price
   ];
});

$factory->state(OrderItem::class, 'hosting', function (Faker $faker) {
    $product = Product::ofType('hosting')->inRandomOrder()->limit(1)->get()->first();
    return [
        'product_id' => $product->id,
        'product_type' => Product::class,
        'price' => $product->price
    ];
});

$factory->state(OrderItem::class, 'ssl', function (Faker $faker) {
    $product = Product::ofType('ssl_certificate')->inRandomOrder()->limit(1)->get()->first();
    return [
        'product_id' => $product->id,
        'product_type' => Product::class,
        'price' => $product->price
    ];
});
