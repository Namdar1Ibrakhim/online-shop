<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        // if(Auth::check()){
        //     return redirect()->intended(route('user.private'));
        // }

        $formFields = $request->only(['email', 'password']);
        
        if(Auth::attempt($formFields)){
            if(Auth::user()->role == 2 || Auth::user()->role == 1){
                return redirect()->intended(route('user.private'));
            }else if(Auth::user()->role == 0){
                return redirect(route('user.login'))->withErrors([
                    'email' => 'Не достаточно прав'
                ]);
            }
        }

        return redirect(route('user.login'))->withErrors([
            'email' => 'Не удалось авторизоваться'
        ]);
    }
}
