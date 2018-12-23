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

Route::get('favoritelistings/{id}', 'API\FavoriteListingController@show')->middleware('auth:api');
Route::get('favoritelistings', 'API\FavoriteListingController@index')->middleware('auth:api');
Route::post('favoritelistings', 'API\FavoriteListingController@store')->middleware('auth:api');
Route::put('favoritelistings/{id}', 'API\FavoriteListingController@update')->middleware('auth:api');
Route::delete('favoritelistings/{id}', 'API\FavoriteListingController@destroy')->middleware('auth:api');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
