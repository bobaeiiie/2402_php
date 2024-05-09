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
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => '홍길동', 'email' => 'admin@admin.com', 'password' => Hash::make('qwer1234!')]
            ,['name' => '갑돌이', 'email' => 'admin2@admin.com', 'password' => Hash::make('qwer1234!')]
            ,['name' => '갑순이', 'email' => 'admin3@admin.com', 'password' => Hash::make('qwer1234!')]
            ]);
    }
}
