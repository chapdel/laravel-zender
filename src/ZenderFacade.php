<?php

namespace Chapdel\Zender;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Chapdel\Zender\Zender
 */
class ZenderFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-zender';
    }
}
