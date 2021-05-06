<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create(['id' => 1, 'name' => '#タグ名1']);
        Tag::create(['id' => 2, 'name' => '#タグ名2']);
        Tag::create(['id' => 3, 'name' => '#タグ名3']);
        Tag::create(['id' => 4, 'name' => '#タグ名4']);
        Tag::create(['id' => 5, 'name' => '#タグ名5']);
    }
}
