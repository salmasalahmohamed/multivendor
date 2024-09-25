<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::middleware('language')->prefix('{local}/')->group(function (){
    Route::get('home',[\App\Http\Controllers\Web\Front\HomeController::class,'index'])->name('home');
   Route::get('product/{product:slug}',[\App\Http\Controllers\Web\Front\auth\ProductController::class,'showOneProduct'])->name('product');
    Route::get('cart/show',[\App\Http\Controllers\Web\Front\auth\CartController::class,'index'])->name('cart');

        Route::post('cart',[\App\Http\Controllers\Web\Front\auth\CartController::class,'store'])->name('cart.store');

        Route::get('checkout',[\App\Http\Controllers\Web\Front\auth\CheckoutController::class,'checkout'])->name('cart.checkout');
        Route::post('checkout',[\App\Http\Controllers\Web\Front\auth\CheckoutController::class,'store'])->name('checkout.store');
        Route::get('enable',[\App\Http\Controllers\Web\Front\auth\TwoFactorController::class,'enableView']);



});
Route::post('currency',[\App\Http\Controllers\Web\Front\auth\CurrencyConverterController::class,'store']);

Route::get('payment/{order}',[\App\Http\Controllers\Web\Front\auth\PaymentController::class,'create']);
Route::get('payment/{order}',[\App\Http\Controllers\Web\Front\auth\PaymentController::class,'create']);
Route::post('payment/strip/{order}',[\App\Http\Controllers\Web\Front\auth\PaymentController::class,'createstrippaymentintent'])->name('strip.payment');


Route::get('admin/google/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('admin/google/auth/callback',[\App\Http\Controllers\Web\Front\auth\SocialiteController::class,'google']);

