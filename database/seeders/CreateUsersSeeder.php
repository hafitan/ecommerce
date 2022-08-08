<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username' => 'admin',
                'email' => 'adminn@gmail.com',
                'role' => 1,
                'password' => bcrypt('12345678')
            ],
            [
                'username' => 'oryza',
                'email' => 'oryza@gmail.com',
                'role' => 1,
                'password' => bcrypt('12345678')
            ],
            [
                'username'=>'anval',
               'email'=>'anval@gmail.com',
                'role'=>'0',
               'password'=> bcrypt('87654321'),
            ],
        ];
        foreach($user as $key => $value) {
            User::create($value);
        }
    }
}
