<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});
require __DIR__.'/user.php';

require __DIR__.'/dashboard.php';

//require __DIR__.'/auth.php';

