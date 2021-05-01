<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'category_id' => $faker->numberBetween($min = 1, $max = 4),
        'brand_id' => $faker->numberBetween($min = 1, $max = 5),
        'price' => $faker->numberBetween($min = 100, $max = 10000),
        'quantity' => $faker->numberBetween($min = 1, $max = 10),
        'image_path1' => '',
        'image_path2' => '',
        'image_path3' => '',
        'image_path4' => '',
        'image_path5' => '',
        'image_title1' => '',
        'image_title2' => '',
        'image_title3' => '',
        'image_title4' => '',
        'image_title5' => '',
        'description' => 'This is description txt...',
    ];
});
