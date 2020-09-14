<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role'=>'admin',
            'name' =>'Mr. Admin',
            'email' =>'admin@test.com',
            'password' =>Hash::make('rootadmin')

        ]);
        DB::table('users')->insert([
            'role'=>'user',
            'name' =>'Mr. User',
            'email' =>'user@test.com',
            'password' =>Hash::make('rootuser'),

        ]);
    }
}
