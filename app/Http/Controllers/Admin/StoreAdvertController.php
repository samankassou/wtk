<?php

namespace App\Http\Controllers\Admin;

use App\Models\Advert;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAdvertRequest;

class StoreAdvertController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreAdvertRequest $request)
    {
        $data = Arr::except($request->validated(), ['categories', 'images']);


        $data['is_featured']         = $request->is_featured ?? 0;
        $data['content']             = $request->content ?? "";
        $data['latitude']            = $request->latitude ?? 0;
        $data['longitude']           = $request->longitude ?? 0;
        $data['square']              = $request->square ?? 0;
        $data['user_id']             = $request->account;
        $data['features']            = $request->features ?? [];
        $data['visit_fees']          = $request->visit_fees ?? 0;
        $data['commission']          = $request->commission ?? 0;
        $data['number_of_bedrooms']  = $request->number_of_bedrooms ?? 0;
        $data['number_of_bathrooms'] = $request->number_of_bathrooms ?? 0;

        $advert = DB::transaction(function () use($data, $request) {

            $advert = Advert::create($data);

            $advert->categories()->attach($request->categories);

            return $advert;
        });

        $images = json_decode($request->images);

        // if user uploaded some images
        if(count($images)){
            upload_images($advert, $images, 'images');
        }


        return redirect()
        ->route('admin.adverts.index')
        ->with('success', __('Advert created successfully'));
    }
}
