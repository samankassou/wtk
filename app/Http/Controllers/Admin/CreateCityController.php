<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCityRequest;

class CreateCityController extends Controller
{
    public function create()
    {
        return view('backend.admin.cities.create');
    }

    public function store(StoreCityRequest $request)
    {
        City::create([
        'name' => $request->name,
        'description' => $request->description,
        'is_featured' => $request->is_featured ?? 0
        ]);

        return redirect()->route('admin.cities.index')->with('success', 'City created successfully');
    }
}
