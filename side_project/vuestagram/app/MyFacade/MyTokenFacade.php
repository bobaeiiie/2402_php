<?php

namespace App\MyFacade;

use Illuminate\Support\Facades\Facade;

class MyTokenFacade extends Facade {
    protected static function getFacadeAccessor()
    {
        return 'MyToken';
    }
}