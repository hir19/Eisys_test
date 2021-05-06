<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();

        DB::table('admins')->insert([
            [
                'name' => '最高管理者',
                'username' => 'system',
                'email' => 'admin@test.test',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => Hash::make('system'),
                'role_id' => 1,
                'shop_id' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('admins')->insert([
            [
                'name' => '管理者',
                'username' => 'admin',
                'email' => 'admin@test.test',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => Hash::make('admin'),
                'role_id' => 2,
                'shop_id' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('admins')->insert([
            [
                'name' => 'shop1',
                'username' => 'shop1',
                'email' => 'shop1@test.test',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => Hash::make('shop1'),
                'role_id' => 3,
                'shop_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('admins')->insert([
            [
                'name' => 'shop2',
                'username' => 'shop2',
                'email' => 'shop2@test.test',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => Hash::make('shop2'),
                'role_id' => 3,
                'shop_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
