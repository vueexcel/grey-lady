<?php

namespace App\Http\Controllers;

use DB;
use App\Models\listingstream;
use App\Models\NewsAndUpdates;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use GuzzleHttp\Client as GuzzleHttpClient;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $userid = auth()->id();
        $news = NewsAndUpdates::orderBy('id', 'desc')->get()->toJson();
        $app = NewsAndUpdates::where('type', 'app')->orderBy('id', 'desc')->get()->toJson();
        $stream = listingstream::where('user_id', $userid)->get()->toJson();           
        View::share('news', $news);
        View::share('greylady_app', $app);
        return view('dashboard')->with('stream', $stream);     
    }
}
