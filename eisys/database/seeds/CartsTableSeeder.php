<?php

use App\Models\Cart;
use Illuminate\Database\Seeder;

class CartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cart::create(['id' => 1]);
        Cart::create(['id' => 2]);
        Cart::create(['id' => 3]);
        Cart::create(['id' => 4]);
        Cart::create(['id' => 5]);
        Cart::create(['id' => 6]);
        Cart::create(['id' => 7]);
        Cart::create(['id' => 8]);
        Cart::create(['id' => 9]);
        Cart::create(['id' => 10]);
    }
}
