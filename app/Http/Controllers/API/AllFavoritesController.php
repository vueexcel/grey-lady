<?php

//https://itsolutionstuff.com/post/laravel-57-create-rest-api-with-authentication-using-passport-tutorialexample.html

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController as BaseController;
use App\FavoriteZips;
use App\FavoriteListing;
use Validator;


class AllFavoritesController extends BaseController
{

    public function bothZipsAndListings()
    {
     

        $FavoriteZips = FavoriteZips::where('user_id', Auth::id())->get();
        $FavoriteListings = FavoriteListing::where('user_id', Auth::id())->get();

        $response = array();
        $response['favorite_listings'] = $FavoriteListings->toArray();
        $response['favorite_zips'] = $FavoriteListings->toArray();

        return $this->sendResponse($response, 'FavoriteZips and FavoriteListings retrieved successfully.');
    }
}