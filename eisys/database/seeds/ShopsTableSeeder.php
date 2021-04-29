<?php

use App\Models\Shop;
use Illuminate\Database\Seeder;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shop::create(['id' => 1, 'name' => 'アニメイト']);
        Shop::create(['id' => 2, 'name' => 'ゲーマーズ']);
        Shop::create(['id' => 3, 'name' => 'メロンブックス']);
        Shop::create(['id' => 4, 'name' => 'まんだらけ']);
        Shop::create(['id' => 5, 'name' => '虎の穴']);
        Shop::create(['id' => 6, 'name' => '駿河屋']);
        Shop::create(['id' => 7, 'name' => 'ソフマップ']);
        Shop::create(['id' => 8, 'name' => 'K-BOOKS']);
        Shop::create(['id' => 9, 'name' => 'コトブキヤ']);
    }
}
