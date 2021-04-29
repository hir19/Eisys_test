<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cart;
use Faker\Generator as Faker;

$factory->define(Cart::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 50),
        'product_id' => $faker->numberBetween($min = 1, $max = 50),
        'cart_id' => $faker->numberBetween($min = 1, $max = 10),
        'quantity' => $faker->numberBetween($min = 1, $max = 10),
    ];
});
