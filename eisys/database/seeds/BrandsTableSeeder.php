<?php

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create(['id' => 1, 'shop_id'=>1, 'name' => 'IOSYS']);
        Brand::create(['id' => 2, 'shop_id'=>1, 'name' => 'cygamas']);
        Brand::create(['id' => 3, 'shop_id'=>2, 'name' => 'IOSYS']);
        Brand::create(['id' => 4, 'shop_id'=>2, 'name' => 'cygamas']);
        Brand::create(['id' => 5, 'shop_id'=>2, 'name' => 'sumzap']);

    }
}
