<?php

//https://itsolutionstuff.com/post/laravel-57-create-rest-api-with-authentication-using-passport-tutorialexample.html

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\FavoriteZips;
use App\FavoriteListing;
use Validator;


class FavoritesController extends Controller
{
 
    public function zips()
    {    
        $FavoriteZips = FavoriteZips::where('user_id', Auth::id())->get();

        $favorites_as_array = $FavoriteZips->toArray();

        $ids_as_array = array();

        foreach ($favorites_as_array as $key => $item) {
            $ids_as_array[] = $item['greylady_id'];
        }

        $ids_as_string = implode(',', $ids_as_array);

        return view('favorites.explore-favorites-zips')->with('favorite_ids', $ids_as_string);
        
    }

    public function listings()
    {    
        $FavoriteListings = FavoriteListing::where('user_id', Auth::id())->get();

        $favorites_as_array = $FavoriteListings->toArray();

        $ids_as_array = array();

        foreach ($favorites_as_array as $key => $item) {
            $ids_as_array[] = $item['greylady_id'];
        }

        $ids_as_string = implode(',', $ids_as_array);

        return view('favorites.explore-favorites-listings')->with('favorite_ids', $ids_as_string);        
    }

}