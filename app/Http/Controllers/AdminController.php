<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\Advert;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('backend.admin.dashboard');
    }

    public function cities()
    {
        $cities = City::withCount('adverts')->paginate(10);
        return view('backend.admin.cities.index', compact('cities'));
    }

    public function users()
    {
        $users = User::all();
        return view('backend.admin.users.index', compact('users'));
    }

    public function adverts()
    {
        $adverts = Advert::all();
        return view('backend.admin.adverts.index', compact('adverts'));
    }

    public function categories()
    {
        $categories = Category::all();
        return view('backend.admin.categories.index', compact('categories'));
    }
}
