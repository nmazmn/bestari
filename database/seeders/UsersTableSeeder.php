<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'Mohammad Khairunnaim',
                'email' => 'naim@terato.com',
                'code' => '1234',
                'password' => Hash::make('password'),
            ],
        );
        DB::table('users')->insert(
            [
                'name' => 'Ahmad Zuhaili',
                'email' => null,
                'code' => 5678,
                'password' => Hash::make('password'),
            ]
        );
    }
}
