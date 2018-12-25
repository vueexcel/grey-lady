<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', 'API\RegisterController@register');


Route::apiResource('favoritelistings', 'API\FavoriteListingController')->middleware('auth:api');
Route::apiResource('favoritezips', 'API\FavoriteZipsController')->middleware('auth:api');
Route::get('favorites/all', 'API\AllFavoritesController@bothZipsAndListings')->middleware('auth:api');

Route::get('user', 'API\UsersController@show')->middleware('auth:api');
Route::put('user', 'API\UsersController@update')->middleware('auth:api');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
