<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateCityRequest;
use App\Models\City;

class UpdateCityController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateCityRequest $request, City $city)
    {
        $city->update(
            [
            'name' => $request->name,
            'description' => $request->description,
            'is_featured' => $request->is_featured ?? 0
            ]
        );
        return redirect()->route('admin.cities.index')->with('success', 'City updated successfully');
    }
}
