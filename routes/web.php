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


// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('/qcbY0xYzlU/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/qcbY0xYzlU/register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');



Route::get('/getting-started', function () {
        return view('help.getting-started');
    });
Route::get('/chrome-extension-download-instructions', function () {
    return view('help.chrome-extension-download');
});

Route::get('/chrome-extension-download-instructions/latest', function () {
    return view('help.chrome-extension-download-latest');
});
    

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');



Route::group(['middleware' => 'auth'], function() {

    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/', 'DashboardController@index');
    
    Route::get('/explore', function () {
        return view('explore.explore');
    });
    Route::get('/explore/export', function () {
        return view('explore.export');
    });
    
    Route::get('/scenario/run/{id}', 'ScenarioController@run');

    Route::get('/explore/favorites/zips', 'FavoritesController@zips');
    Route::get('/explore/favorites/listings', 'FavoritesController@listings');
    
    Route::get('/explore/{zip}', 'ZipController@details');

    Route::get('/listings', function () {
        return view('listings');
    });
    Route::get('/listing/{id}', 'ListingController@details');
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

    

    Route::get('/home', 'HomeController@index')->name('home');



});


