<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
                'first_name' => '太郎',
                'last_name' => '田中',
                'email' => 'user@test.test',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => Hash::make('test'),
                'points' => '1000',
                'phone' => '12345678901',
                'address1' => '埼玉県さいたま市北区南川',
                'address2' => 'sss団マンション201号室',
                'zip_code' => '1234567',
                'state' => '埼玉',
                'city' => 'さいたま',
                'country' => '日本',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        ]);

        factory(User::class, 50)->create();


        // for ($i=0; $i < 1000; $i++) {
        //     factory(User::class, 1000)->create();
        // }
    }
}
