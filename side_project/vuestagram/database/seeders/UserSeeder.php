<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        $data = [
            'account' => 'admin'
            ,'password' => Hash::make('admin')
            ,'name' => '관리자'
            ,'gender' => '0'
            ,'profile' => '/profile/default/png'
        ];
        User::create($data);
    }
}
