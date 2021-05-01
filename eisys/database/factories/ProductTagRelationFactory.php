<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductTagRelationFactory;
use Faker\Generator as Faker;

$factory->define(ProductTagRelationFactory::class, function (Faker $faker) {
    return [
        'tag_id' => $faker->numberBetween($min = 1, $max = 5),
        'product_id' => $faker->numberBetween($min = 1, $max = 20),
    ];
});
