<?php

namespace App\MyFacade;

use Illuminate\Support\Facades\Facade;

class MyEncryptFacade extends Facade {
    protected static function getFacadeAccessor()
    {
        return 'MyEncrypt';
    }
}