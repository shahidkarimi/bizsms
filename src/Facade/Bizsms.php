<?php

namespace Shahidkarimi\Bizsms\Facade;

use Illuminate\Support\Facades\Facade;

class Bizsms extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'bizsms';
    }

    public static function testing()
    {
        echo "Testing";
    }
}
