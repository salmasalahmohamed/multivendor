<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class SwitchLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        URL::defaults(['local'=>Session::get('lang')]);

        Session::put('lang',$request->segment(1));

        App::setLocale(Session::get('lang'));
        //don't pass this parameter to controller
        Route::current()->forgetParameter('local');
        return $next($request);
    }
}
