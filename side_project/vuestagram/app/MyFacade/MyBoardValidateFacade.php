<?php

namespace App\MyFacade;

use Illuminate\Support\Facades\Facade;

class MyBoardValidateFacade extends Facade {
    protected static function getFacadeAccessor()
    {
        return 'MyBoardValidate';
    }
}