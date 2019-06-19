<?php

namespace App\Providers;

use App\Models\Deals;
use App\Models\listingstream;
use App\Models\NewsAndUpdates;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) 
        {
            $userid = auth()->id();
            $news = NewsAndUpdates::orderBy('id', 'desc')->get()->toJson();
            $stream = listingstream::where('user_id', $userid)->orderBy('id', 'desc')->get()->toJson();
            $deals = Deals::where('user_id', $userid)->orderBy('id', 'DESC')->get()->toJson();
            $view->with([
                'news' => $news, 
                'stream' => $stream,
                'deals' => $deals
            ]);
        }); 
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
