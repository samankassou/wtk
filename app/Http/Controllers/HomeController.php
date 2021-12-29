<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\Advert;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $cities = City::all(['id', 'name']);
        $categories = Category::all(['id', 'name']);
        $featuredAgents = User::FeaturedAgent()->limit(4)->withCount('properties')->get();
        $propertiesForRent = Advert::with(['city', 'categories'])->where('type', 'rent')->limit(5)->get();
        return view('home', compact('cities', 'categories', 'propertiesForRent', 'featuredAgents'));
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

}
