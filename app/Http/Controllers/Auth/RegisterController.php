<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'unique:users,email'],
            'username' => ['required', 'string', 'unique:users,username'],
            'password' => ['required', 'min:8', 'confirmed'],
            'phone'    => ['required', 'size:9']
        ]);

        $social_links = [
            'facebook' => "",
            'twitter'  => "",
            'linkedin' => ""
        ];

        $user = User::create([
            'name'         => $request->name,
            'email'        => $request->email,
            'username'     => $request->username,
            'phone'        => $request->phone,
            'password'     => bcrypt($request->password),
            'social_links' => $social_links
        ]);

        event(new Registered($user));

        Auth::login($user, true);

        return redirect()->intended(route('home'));
    }
}
