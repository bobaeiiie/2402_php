<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EduController extends Controller
{
    public function index() {
        $arr =[
            'id' => 1
            ,'name' => '홍길동'
            ,'tel' => '01099998888'
        ];

        return view('edu')
        ->with('gender', 'F')
        ->with('data', $arr)
        ->with('data2', [])
        ->with('dan', '2')
        ->with('num,', '1');
    }
}
