<?php
namespace App\Utils;

use App\Utils\MyValidate;

class MyBoardValidate extends MyValidate {
    protected $validateList = [
        'id' => ['regex:/^[0-9]+$/']
        ,'content' => ['required', 'max:200']
        ,'img' => ['image']
        
    ];
}