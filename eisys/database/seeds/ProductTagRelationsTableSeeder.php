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
        factory(ProductTagRelation::class, 500)->create();
    }
}
