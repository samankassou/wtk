<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\User;
use App\Models\Advert;
use App\Models\Feature;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpdateAdvertController extends Controller
{
    /**
     * Display the 'edit advert' form.
     *
     * @param  \App\Models\Advert  $advert
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Advert $advert)
    {
        $advert->load('categories');

        $categories = Category::all(['id', 'name']);
        $cities = City::all(['id', 'name']);
        $types = ['rent', 'sale'];
        $features = Feature::all(['id', 'name']);
        $moderationStatus = ['pending', 'approved', 'rejected'];
        $accounts = User::agent()->get(['id', 'name']);
        $status = ['not available', 'preparing selling', 'selling', 'sold', 'renting', 'rented'];
        $periods = ['day', 'month', 'year'];

        return view('backend.admin.adverts.edit',
    compact('advert', 'categories', 'types', 'cities', 'features', 'moderationStatus', 'accounts', 'status', 'periods'));
    }

    public function update(Request $request, Advert $advert)
    {
        dd($request->all());
    }
}
