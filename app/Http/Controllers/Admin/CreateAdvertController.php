<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Feature;
use App\Models\User;

class CreateAdvertController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $categories = Category::all(['id', 'name']);
        $cities = City::all(['id', 'name']);
        $types = ['rent', 'sale'];
        $features = Feature::all(['id', 'name']);
        $moderationStatus = ['pending', 'approved', 'rejected'];
        $accounts = User::agent(['id', 'name']);
        $status = ['Not available', 'Preparing selling', 'Selling', 'Sold', 'Renting', 'Rented'];
        return view('backend.admin.adverts.create', compact('categories', 'types', 'cities', 'features', 'moderationStatus', 'accounts', 'status'));
    }
}
