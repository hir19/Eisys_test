<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
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

        $i=0;
        while ($i < 2000) {
            $arr = [];
            for($j = 0; $j < 500; ++$j){
                $arr[] = [
                    'first_name' => 'first'.$i,
                    'last_name' => 'last'.$i,
                    'email' => "user".$i.'a'.$j."@test.test",
                    'email_verified_at' => now(),
                    'password' => "pass",
                    'points' => $faker->numberBetween($min = 0, $max = 9999),
                    'phone' => '12345678901',
                    'address1' => 'address1',
                    'address2' => 'address2',
                    'zip_code' => '1234567',
                    'state' => '埼玉',
                    'city' => 'さいたま',
                    'country' => '日本',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
            }
            User::insert($arr);
            ++$i;
        }
    }
}
