<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\login;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\Customer;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
//        if (\Illuminate\Support\Facades\Request::is('admin/*')){
//            Config::set('fortify.guard','web');
//        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::registerView('user.register');

        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::resetPasswordView('user.reset');
       // Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);

        Fortify::loginView(function () {
            return view('user.login');
        });

        Fortify::confirmPasswordView('user.confirm');
         Fortify::verifyEmailView('user.verify');
        Fortify::requestPasswordResetLinkView('user.forgot');
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);


        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::twoFactorChallengeView(function () {
            return view('user.two-factor-challenge');
        });
        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
