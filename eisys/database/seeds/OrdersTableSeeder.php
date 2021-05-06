<?php

use App\Models\Order;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $now = new DateTime();
        $i=0;
        while ($i < 20000) {
            $arr = [];
            for($j = 0; $j < 500; ++$j){
                $arr[] = [
                    'user_id' => $faker->numberBetween($min = 1, $max = 100000),
                    'product_id' => $faker->numberBetween($min = 1, $max = 300000),
                    'quantity' => $faker->numberBetween($min = 1, $max = 50),
                    'is_delivered' => false,
                    'created_at' => $now,
                ];
            }
            Order::insert($arr);
            ++$i;
        }
    }
}
