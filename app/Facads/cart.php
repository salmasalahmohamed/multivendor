<?php
namespace App\Facads;
use Illuminate\Support\Facades\Facade;

class cart extends Facade {
    protected static function getFacadeAccessor()
    {
        return 'cart';
    }

}
