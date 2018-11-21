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

Route::get('/', function () {
    return view('zips');
});

Route::get('/listings', function () {
    return view('listings');
});

Route::get('/zips', function () {
    return view('zips');
});

Route::get('/watchlist', function () {
    return view('watchlist');
});
