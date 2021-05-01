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
                'password' => Hash::make('test1'),
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
                'password' => Hash::make('test1'),
                'role_id' => 2,
                'shop_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('admins')->insert([
            [
                'name' => 'アニメイト',
                'username' => 'animete',
                'email' => 'animete@test.test',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => Hash::make('test1'),
                'role_id' => 3,
                'shop_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
