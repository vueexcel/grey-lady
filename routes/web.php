<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/home', function () {
        return view('home');
    });
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');



Route::group(['middleware' => 'auth'], function() {



    Route::get('/', function () {
        return view('explore.explore');
    });
    Route::get('/explore', function () {
        return view('explore.explore');
    });
    Route::get('/explore/favorites/zips', function () {
        return view('explore.explore-favorites-zips');
    });
    Route::get('/explore/favorites/listings', function () {
        return view('explore.explore-favorites');
    });
    Route::get('/explore/{zip}', 'ZipController@details');



    Route::get('/listings', function () {
        return view('listings');
    });
    Route::get('/listings/details', function () {
        return view('listings-details');
    });
    Route::get('/listings/create', function () {
        return view('listings-create');
    });



    Route::get('/zips', function () {
        return view('zips');
    });
    Route::get('/zips/details', function () {
        return view('zips-details');
    });
    Route::get('/zips/create', function () {
        return view('zips-create');
    });



    Route::get('/watchlist', function () {
        return view('watchlists');
    });
    Route::get('/watchlists/create', function () {
        return view('watchlists-create');
    });

    

    // Route::get('/home', 'HomeController@index')->name('home');



});


