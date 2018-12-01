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

Route::get('/explore', function () {
    return view('explore');
});
Route::get('/explore/{zip}', 'ZipController@details');


Route::get('/', function () {
    return view('zips');
});
Route::get('/zips/create', function () {
    return view('zips-create');
});


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


Route::get('/watchlist', function () {
    return view('watchlists');
});
Route::get('/watchlists/create', function () {
    return view('watchlists-create');
});
