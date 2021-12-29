<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function add(Request $request, $id)
    {
        $whishlit = session('wishlist', collect([]));

        if($whishlit->doesntContain($id)){
            $whishlit->push($id);
        }

        session(['wishlist' => $whishlit]);

        return $whishlit->count();
    }

    public function remove(Request $request, $id)
    {
        $whishlit = session('wishlist', collect([]));

        if($whishlit->contains($id)){

            $whishlit = $whishlit->filter(function($item) use($id){
                return $item != $id;
            });
        }

        session(['wishlist' => $whishlit]);

        return response()->json($whishlit->count());
    }

    public function getWishListCount()
    {
        $whishlit = session('wishlist', collect([]));

        return response()->json($whishlit->count());
    }

    public function getWishList()
    {
        $whishlit = session('wishlist', collect([]));

        return response()->json($whishlit);
    }
}
