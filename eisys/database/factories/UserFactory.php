<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| User Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique(false, 1000000)->lexify('????????????????????????????????@test.test'),
        'email_verified_at' => now(),
        'password' => $faker->password,
        'points' => $faker->numberBetween($min = 0, $max = 9999),
        'phone' => '12345678901',
        'address1' => 'address1',
        'address2' => 'address2',
        'zip_code' => $faker->postcode,
        'state' => '埼玉',
        'city' => 'さいたま',
        'country' => $faker->country(),
        'remember_token' => Str::random(10),
    ];
});
