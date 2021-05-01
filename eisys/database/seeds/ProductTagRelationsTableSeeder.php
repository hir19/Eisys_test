<?php

use App\Models\ProductTagRelation;
use Illuminate\Database\Seeder;

class ProductTagRelationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductTagRelation::create(['product_id' => 1, 'tag_id' => 1]);
        ProductTagRelation::create(['product_id' => 2, 'tag_id' => 2]);
        ProductTagRelation::create(['product_id' => 2, 'tag_id' => 3]);
        ProductTagRelation::create(['product_id' => 3, 'tag_id' => 4]);
        ProductTagRelation::create(['product_id' => 3, 'tag_id' => 5]);
        ProductTagRelation::create(['product_id' => 3, 'tag_id' => 1]);

        // factory(ProductTagRelation::class, 10)->create();
    }
}
