<?php

/** @var Factory $factory */

use App\Models\CustomerBiodata;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(CustomerBiodata::class, function (Faker $faker) {
    return [
        'phone_number' => $faker->e164PhoneNumber,
        'address' => $faker->address,
        'city' => $faker->city,
        'country' => $faker->country,
        'organization' => $faker->company
    ];
});
