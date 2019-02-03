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





Route::apiResource('favoritelistings', 'API\FavoriteListingController')->middleware('auth:api');
Route::delete('favoritelistings/byGreylady/{id}', 'API\FavoriteListingController@destroyByGreylady')->middleware('auth:api');

Route::apiResource('favoritezips', 'API\FavoriteZipsController')->middleware('auth:api');
Route::delete('favoritezips/byGreylady/{id}', 'API\FavoriteZipsController@destroyByGreylady')->middleware('auth:api');

Route::get('user/all', 'API\UsersController@allInfo')->middleware('auth:api');

Route::get('secure', 'API\SecureController@get')->middleware('auth:api');
Route::post('secure', 'API\SecureController@post')->middleware('auth:api');
Route::post('secure/bootup', 'API\SecureController@bootup')->middleware('auth:api');

Route::post('parsingError', 'API\ParseErrorAPIController@store')->middleware('auth:api');

Route::get('user', 'API\UsersController@show')->middleware('auth:api');


// Route::post('register', 'API\RegisterController@register');
// Route::put('user', 'API\UsersController@update')->middleware('auth:api');
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
