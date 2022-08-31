<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Session;
use Socialite;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function loginType()
    {
        return view('auth.ModoDeLogin');
    }

    public function redirectToProvider(Request $request)
    {
        if($request->loginType == "senhaUnica"){
            return Socialite::driver('senhaunica')->redirect();
        };
        return view('auth.loginForm');
    }

    public function localLogin(Request $request){
        $user = User::where('email',$request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user, true);
                return redirect('/');
            }
        }
        request()->session()->flash('alert-danger','Usuário ou senha inválido.');
        return redirect('/redirectToProvider');

    }

}
