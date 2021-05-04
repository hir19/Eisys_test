<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductTagRelation;
use Faker\Generator as Faker;

$factory->define(ProductTagRelation::class, function (Faker $faker) {
    return [
        'tag_id' => $faker->numberBetween($min = 1, $max = 5),
        'product_id' => $faker->numberBetween($min = 1, $max = 50),
    ];
});
