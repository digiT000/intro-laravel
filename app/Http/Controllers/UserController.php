<?php

namespace App\Http\Controllers;

use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    

    public function register(Request $request){

        $incomingFields = $request->validate([
            'name'=>['bail','required','max:50'],
            'email'=>['bail','required','email:rfc,dns'],Rule::unique('users','email'),
            'password'=>['bail','required','min:5']
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);

        $user= User::create($incomingFields);
        Auth::login($user);
    

        return redirect('/');

    }

    public function logout(Request $request){
        Auth::logout();

        return redirect('/');
    }

    public function login(Request $request){
        $incomingFields = $request->validate([
            'login-email'=>['bail','required'],
            'login-password'=>['required']
        ]);

        $validLogin = Auth::attempt([
            'email'=>$incomingFields['login-email'],
            'password'=>$incomingFields['login-password']
        ]);

        if($validLogin){        
            $request->session()->regenerate();
            return redirect('/');
        }else{
            return back()->withInput($request->only('login-email'));
        }

       

        

    }

}
