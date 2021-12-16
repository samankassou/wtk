<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCityRequest;
use App\Models\City;

class StoreCityController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreCityRequest $request)
    {
        City::create([
            'name' => $request->name,
            'description' => $request->description,
            'is_featured' => $request->is_featured ?? 0
        ]);

        return redirect()->route('admin.cities.index')->with('success', 'City created successfully');
    }
}
