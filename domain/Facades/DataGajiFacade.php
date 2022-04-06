<?php

namespace Domain\Facades;

use Illuminate\Support\Facades\Facade;

class DataGajiFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'data-gaji';
    }
}
