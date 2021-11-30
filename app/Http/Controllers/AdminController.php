<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('backend.admin.dashboard');
    }

    public function cities()
    {
        $cities = City::all();
        return view('backend.admin.cities.index', compact('cities'));
    }

    public function users()
    {
        $users = User::all();
        return view('backend.admin.users.index', compact('users'));
    }
}
