<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auths.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

            return redirect()->route('login')->withInput()->withErrors([
                'email' => __('auth.failed')
            ]);
        }

        $route = 'home';
        if(auth()->user()->role == 'admin'){
            $route = 'admin.dashboard';
        }else if(auth()->user()->role == 'moderator'){
            $route = 'moderator.dashboard';
        }

        return redirect()->intended(route($route));
    }
}
