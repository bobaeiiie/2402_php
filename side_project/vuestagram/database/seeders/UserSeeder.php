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
            'account' => 'bobae'
            ,'password' => Hash::make('admin')
            ,'name' => '보배'
            ,'gender' => '0'
            ,'profile' => '/profile/default.jpg'
        ];
        User::create($data);
    }
}
