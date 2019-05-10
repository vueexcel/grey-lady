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
Route::get('/plugin/instructions', function () {
    return view('help.chrome-extension-download');
});

Route::get('/plugin/latest', function () {
    return view('help.chrome-extension-download-latest');
});
    

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');



Route::group(['middleware' => 'auth'], function() {


    //beta users get access to these views
    Route::get('/dashboard', function(){
        return view('dashboard');
    });
    Route::get('/', function(){
        return view('dashboard');
    });
    Route::get('/scenario/run/{id}', 'ScenarioController@run');
    Route::get('/explore/favorites/zips', 'FavoritesController@zips');
    Route::get('/explore/favorites/listings', 'FavoritesController@listings');
    Route::get('/home', 'HomeController@index');


    
    
    //only admin users get access to these roles. 
    Route::get('/explore', function () {
        $user = Auth::user();
        abort_unless($user->hasRole('admin'), 403);
        return view('explore.explore');
    });
    Route::get('/explore/export', function () {
        $user = Auth::user();
        abort_unless($user->hasRole('admin'), 403);
        return view('explore.export');
    });
    Route::get('/explore/{zip}', 'ZipController@details');
    Route::get('/listings', function () {
        $user = Auth::user();
        abort_unless($user->hasRole('admin'), 403);
        return view('listings');
    });
    Route::get('/listing/{id}', 'ListingController@details');
    Route::get('/listings/create', function () {
        $user = Auth::user();
        abort_unless($user->hasRole('admin'), 403);
        return view('listings-create');
    });
    Route::get('/zips', function () {
        $user = Auth::user();
        abort_unless($user->hasRole('admin'), 403);
        return view('zips');
    });
    Route::get('/zips/details', function () {
        $user = Auth::user();
        abort_unless($user->hasRole('admin'), 403);
        return view('zips-details');
    });
    Route::get('/zips/create', function () {
        $user = Auth::user();
        abort_unless($user->hasRole('admin'), 403);
        return view('zips-create');
    });
    Route::get('/watchlist', function () {
        $user = Auth::user();
        abort_unless($user->hasRole('admin'), 403);
        return view('watchlists');
    });
    Route::get('/watchlists/create', function () {
        $user = Auth::user();
        abort_unless($user->hasRole('admin'), 403);
        return view('watchlists-create');
    });
});


