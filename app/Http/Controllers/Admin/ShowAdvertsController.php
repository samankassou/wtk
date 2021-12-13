<?php

namespace App\Http\Controllers\Admin;

use App\Models\Advert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowAdvertsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $query = Advert::query();

        $query->when(request('type') == 'pending', function($q){
            $q->pending();
        });
        $query->when(request('type') == 'approved', function($q){
            $q->approved();
        });
        $query->when(request('type') == 'rejected', function($q){
            $q->rejected();
        });

        $adverts = $query->paginate(10)->withQueryString();

        $all = Advert::count();
        $pending = Advert::pending()->count();
        $approved = Advert::approved()->count();
        $rejected = Advert::rejected()->count();
        return view('backend.admin.adverts.index', compact('adverts', 'all', 'pending', 'approved', 'rejected'));
    }
}
