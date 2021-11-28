<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('backend.admin.dashboard');
    }

    public function cities()
    {
        $cities = City::withCount('neighborhoods')->get();
        return view('backend.admin.cities.index', compact('cities'));
    }
}
