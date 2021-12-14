<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function redirect()
    {
        if(auth()->user()->role == 'admin'){
            return redirect()->route('admin.dashboard');
        } else if(auth()->user()->role == 'moderator'){
            return redirect()->route('moderator.dashboard');
        }else{
            return redirect()->route('home');
        }
    }

    public function storeImages(Request $request)
    {
        return "ok";
    }
}
