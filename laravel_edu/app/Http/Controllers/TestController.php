<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index() {
        // return 'TestController>>index()';
        return view('test');
    }

    public function create() {
        return 'TestController>>create()';
    }
}

