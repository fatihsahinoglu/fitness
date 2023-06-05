<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert(
            [
                [
                    'description' => 'Title',
                    'key' => 'Title',
                    'content' => 'Fitness App Description',
                    'type' => 'text',
                    'must' => 0,
                    'delete' => "0",
                    'status' => "1"
                ],
                [
                    'description' => 'Description',
                    'key' => 'Title',
                    'content' => 'Fitness App',
                    'type' => 'text',
                    'must' => 1,
                    'delete' => "0",
                    'status' => "1"
                ],
                [
                    'description' => 'Logo',
                    'key' => 'logo',
                    'content' => 'logo.png',
                    'type' => 'file',
                    'must' => 2,
                    'delete' => "0",
                    'status' => "1"
                ],
                [
                    'description' => 'Icon',
                    'key' => 'icon',
                    'content' => 'icon.ico',
                    'type' => 'file',
                    'must' => 3,
                    'delete' => "0",
                    'status' => "1"
                ],
                [
                    'description' => 'Keys',
                    'key' => 'keywords',
                    'content' => 'laravel, fitness',
                    'type' => 'text',
                    'must' => 4,
                    'delete' => "0",
                    'status' => "1"
                ],
                [
                    'description' => 'GSM',
                    'key' => 'phone',
                    'content' => '0850 XXX XX XX',
                    'type' => 'text',
                    'must' => 5,
                    'delete' => "0",
                    'status' => "1"
                ],
                [
                    'description' => 'Mail',
                    'key' => 'mail',
                    'content' => 'support@laravel-fitness.com',
                    'type' => 'text',
                    'must' => 7,
                    'delete' => "0",
                    'status' => "1"
                ]
            ]
        );
    }
}
