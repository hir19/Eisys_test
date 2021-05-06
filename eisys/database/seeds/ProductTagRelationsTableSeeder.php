<?php

use App\Models\ProductTagRelation;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class ProductTagRelationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $i=0;
        while ($i < 1000) {
            $arr = [];
            for($j = 0; $j < 300; ++$j){
                $arr[] = [
                    'tag_id' => $faker->numberBetween($min = 1, $max = 5),
                    'product_id' => $faker->numberBetween($min = 1, $max = 300000),
                ];
            }
            ProductTagRelation::insert($arr);
            ++$i;
        }
    }
}
