<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class error extends Handler
{
    //determine the level of exception [error|exception|debug|throwable]
     protected $levels=[];
     //here dont put error in log file
     protected $dontReport=[];

     // here put coulmns  whrer method old doesnt work
     protected $dontFlash=[];
public function register()
{
//    $this->renderable(function (QueryException $e,Request$request){
//        //with input for old function
//        //with error for global variable errors in view
//        //with to add in session
//        return redirect()->back()->withInput()->with([ 'error'=>$e->getMessage()])->withErrors([
//            'message'=>$e->getMessage()
//        ]);
//    });
}

}
