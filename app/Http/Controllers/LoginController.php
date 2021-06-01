<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Socialite;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function handleProviderCallback()
    {
        $userSenhaUnica  = Socialite::driver('senhaunica')->user();
        $user = User::where('codpes',$userSenhaUnica->codpes)->first();

        if (is_null($user)) $user = new User;

        // bind do dados retornados
        $user->codpes = $userSenhaUnica->codpes;
        $user->email = $userSenhaUnica->email;
        $user->name = $userSenhaUnica->nompes;
        $user->save();
        Auth::login($user, true);
        return redirect('/');
    }

    public function localLogin(Request $request){
        $user = User::where('email',$request->email)->first();
        
        if (!empty($user)) Auth::login($user, true);
        else dd('Usuário não cadastrado.'); /* request()->session()->flash('alert-danger','Usuário não cadastrado.'); */
        return redirect('/');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}