<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([[
            'login' => 'copp',
            'firstname'=> 'admin',
            'lastname'=> 'admin',
            'parentname'=> 'admin',
            'phone'=> 'admin',
            'password' => Hash::make('password'),
            'email'=> 'admin@mail.ru',
            'id_role'=> '1',
        ]]);
    }
}
