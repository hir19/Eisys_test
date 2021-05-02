<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 100),
        'product_id' => $faker->numberBetween($min = 1, $max = 100),
        'quantity' => $faker->numberBetween($min = 1, $max = 10),
        'is_delivered' => false,
    ];
});
