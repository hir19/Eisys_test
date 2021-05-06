<?php

use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class ProductsTableSeeder extends Seeder
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
        while ($i < 1000) {
            $arr = [];
            for($j = 0; $j < 300; ++$j){
                $arr[] = [
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
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
            Product::insert($arr);
            ++$i;
        }
    }
}
