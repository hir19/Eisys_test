<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['id' => 1, 'name' => 'CD']);
        Category::create(['id' => 2, 'name' => 'DVD']);
        Category::create(['id' => 3, 'name' => '書籍']);
        Category::create(['id' => 4, 'name' => 'ゲームソフト']);
    }
}
