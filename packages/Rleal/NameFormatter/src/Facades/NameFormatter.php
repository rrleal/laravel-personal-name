<?php

namespace Rleal\NameFormatter\Facades;

use Illuminate\Support\Facades\Facade;

class NameFormatter extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'nameformatter';
    }
}
