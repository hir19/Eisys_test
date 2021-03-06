<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->lexify('商品名???'),
        'category_id' => $faker->numberBetween($min = 1, $max = 5),
        'brand_id' => $faker->numberBetween($min = 1, $max = 5),
        'price' => $faker->numberBetween($min = 100, $max = 20000),
        'quantity' => $faker->numberBetween($min = 1, $max = 100),
        'image_path1' => 'sample.png',
        'image_path2' => '',
        'image_path3' => '',
        'image_path4' => '',
        'image_path5' => '',
        'image_title1' => 'sample',
        'image_title2' => '',
        'image_title3' => '',
        'image_title4' => '',
        'image_title5' => '',
        'description' => 'This is description txt...',
    ];
});
