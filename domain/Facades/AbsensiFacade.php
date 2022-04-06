<?php

namespace Domain\Facades;

use Illuminate\Support\Facades\Facade;

class AbsensiFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'absensi';
    }
}
