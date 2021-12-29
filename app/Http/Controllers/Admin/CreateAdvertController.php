<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\User;
use App\Models\Advert;
use App\Models\Feature;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAdvertRequest;

class CreateAdvertController extends Controller
{
    /**
     * Display the users form.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::all(['id', 'name']);
        $cities = City::all(['id', 'name']);
        $types = ['rent', 'sale'];
        $features = Feature::all(['id', 'name']);
        $moderationStatus = ['pending', 'approved', 'rejected'];
        $accounts = User::agent()->get(['id', 'name']);
        $status = ['not available', 'preparing selling', 'selling', 'sold', 'renting', 'rented'];
        $periods = ['day', 'month', 'year'];
        return view(
            'backend.admin.adverts.create',
            compact('categories', 'types', 'cities', 'features', 'moderationStatus', 'accounts', 'status', 'periods')
        );
    }

    /**
    * Store the advert in the database.
    *
    * @param \App\Http\Requests\Admin\StoreUserRequest $request
    * @return \Illuminate\Http\RedirectResponse
    */
    public function store(StoreAdvertRequest $request)
    {
        $data = Arr::except($request->validated(), ['_token', 'categories', 'images']);


        $data['city_id'] = $request->city_id;
        $data['is_featured'] = $request->is_featured ?? 0;
        $data['content'] = $request->content ?? "";
        $data['latitude'] = $request->latitude ?? 0;
        $data['longitude'] = $request->longitude ?? 0;
        $data['square'] = $request->square ?? 0;
        $data['user_id'] = $request->account;
        $data['features'] = $request->features ?? [];
        $data['visit_fees'] = $request->visit_fees ?? 0;
        $data['commission'] = $request->commission ?? 0;
        $data['number_of_bedrooms'] = $request->number_of_bedrooms ?? 0;
        $data['number_of_bathrooms'] = $request->number_of_bathrooms ?? 0;

        $advert = DB::transaction(function () use ($data, $request) {

            $advert = Advert::create($data);

            $advert->categories()->attach($request->categories);

            return $advert;
        });

        $images = json_decode($request->images);

        // if user uploaded some images
        if (count($images)) {
            upload_images($advert, $images, 'images');
        }


        return redirect()
            ->route('admin.adverts.index')
            ->with('success', __('Advert created successfully'));
    }
}
