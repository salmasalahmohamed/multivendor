<?php

namespace App\Http\Controllers\Web\Front\auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Repositories\Cart\CartModelRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Laravel\Socialite\Facades\Socialite;
use function view;

class SocialiteController extends Controller
{
    public function google(){
        try {
            $google = Socialite::driver('google')->user();
            $user = \App\Models\Customer::updateOrCreate([
                'google_id' => $google->id,
            ], [
                'first_name' => $google->name,
                'email' => $google->email,
                'google_token' => $google->token,
                'google_refresh_token' => $google->refreshToken,
            ]);

            Auth::login($user);

            return redirect()->intended();
        }catch (\Exception$exception){
            return to_route('login')->withErrors(['email'=>$exception->getMessage()]);
        }

    }
}
