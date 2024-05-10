<?php

namespace Database\Seeders;

use App\Models\BoardName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoardNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BoardName::insert([
            ['type' => '0','name' => '자유게시판']
            ,['type' => '1','name' => '질문게시판']
        ]);
    }
}
