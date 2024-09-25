<?php

namespace App\Http\Controllers\Web\Front\auth;



use App\Http\Controllers\Controller;

class HomeController extends Controller
{

   public function registerform(){
       return view('user.register');
   }
}
