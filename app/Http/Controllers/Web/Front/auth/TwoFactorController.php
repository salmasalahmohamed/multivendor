<?php

namespace App\Http\Controllers\Web\Front\auth;

use App\Http\Controllers\Controller;
use function view;

class TwoFactorController extends Controller
{
    public function enableView(){
        return view('user.twofactorauth');
    }
}
