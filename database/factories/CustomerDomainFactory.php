<?php

/** @var Factory $factory */

use App\Models\CustomerDomain;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(CustomerDomain::class, function (Faker $faker) {
    $domain_tld = \App\Models\Product::ofType('domain')->inRandomOrder()->limit(1)->get()->first();
    return [
        'domain_name' => Str::random(8) . $domain_tld->product_name,
        'domain_tld_id' => $domain_tld->id
    ];
});

$factory->afterCreating(CustomerDomain::class, function (CustomerDomain $domain, Faker $faker) {
    $domain->nameservers()->saveMany([
        \App\Models\Nameserver::create(['domain_id' => $domain->id, 'ip_address' => $faker->ipv4 ]),
        \App\Models\Nameserver::create(['domain_id' => $domain->id, 'ip_address' => $faker->ipv4 ])
    ]);
});
