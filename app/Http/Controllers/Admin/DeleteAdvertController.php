<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use Illuminate\Http\Request;

class DeleteAdvertController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Advert $advert)
    {
        $advert->categories()->detach();
        $advert->delete();

        session()->flash('success', 'Advert deleted successfully');
        return response()->json(['success' => true]);
    }
}
