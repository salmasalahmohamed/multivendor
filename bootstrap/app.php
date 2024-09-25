<?php

use App\Http\Middleware\RedirectIfAuthenticated2;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull;
use Illuminate\Foundation\Http\Middleware\TrimStrings;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->api(prepend: [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        ]);

        $middleware->alias([
            'verified' => \App\Http\Middleware\EnsureEmailIsVerified::class,
        ]);

        $middleware->remove([
            ConvertEmptyStringsToNull::class,
            TrimStrings::class,

        ])->alias([
          'lastactiveuser'=>\App\Http\Middleware\UpdateUserLastActiveAt::class,
            'marknotification'=>\App\Http\Middleware\MarkeNotification::class,
            'language'=>\App\Http\Middleware\SwitchLanguage::class,

            'guest'=>RedirectIfAuthenticated2::class,

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
