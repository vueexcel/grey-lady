<?php

namespace App\Providers;

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
            $app = NewsAndUpdates::where('type', 'app')->orderBy('id', 'desc')->get()->toJson();
            $stream = listingstream::where('user_id', $userid)->get()->toJson();           
            $view->with([
                'news' => $news, 
                'stream' => $stream
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
