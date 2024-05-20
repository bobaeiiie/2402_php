<?php

namespace App\MyFacade;

use Illuminate\Support\Facades\Facade;

class MyUserValidateFacade extends Facade {
    protected static function getFacadeAccessor()
    {
        return 'MyUserValidate';
    }
}