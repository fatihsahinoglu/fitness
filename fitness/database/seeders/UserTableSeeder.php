<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Fitness',
                'surname' => 'Admin',
                'email' => 'admin@fitness.com',
                'password' => Hash::make('12345'),
                'phone' => '555 555 55 55',
                'birthday' => '2023-06-22',
                'status' => 1,
                'role' => 'ADMIN'
            ]
        ]);
        DB::table('user_data')->insert([
            [
                'user_id' => 1,
                'age' => 22,
                'bmr' => 30,
                'height' => 175,
                'weight' => 80,
                'gender' => 'male',
                'type' => 'monthly',
                'status' => 1
            ]
        ]);
    }
}
