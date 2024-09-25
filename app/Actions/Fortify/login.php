<?php
namespace App\Actions\Fortify;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;

class login{
    public function login(Request $request){
        $request->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Attempt to log the user in
        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended(route('home'));
        }
    }

}
