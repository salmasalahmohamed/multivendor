<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Intl\Languages;

class ProfileController extends Controller
{
    public function edit(){
        $countries=Countries::getNames();
        $locals=Languages::getNames();
        $user=Auth::user();
        return view('profile.edit',get_defined_vars());
    }
    public function update(Request $request){
        $request->validate([
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'birthday'=>'required|date',
            'gender'=>'in:male,female',
            'country'=>'required|string',
            'city'=>'required|string',


        ]);
        $request->user()->profile->fill($request->all())->save();
        return redirect('profile/edit')->with('success','you didi successfully');

//        if ($request->user()->profile()->user_id){
//            $request->user()->profile()->update($request->all());
//
//        }else{
//            $request->user()->profile()->create($request->all());
//
//        }
    }

}
