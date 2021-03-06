<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['id' => 1, 'name' => 'system']);

        Role::create(['id' => 2, 'name' => 'admin']);

        Role::create(['id' => 3, 'name' => 'shop']);
    }
}
