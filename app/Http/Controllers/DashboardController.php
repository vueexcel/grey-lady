<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttpClient;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $news = DB::table('news_and_updates')->get()->toJson();
        $stream = DB::table('listingstream')->get()->toJson();        

        return view('dashboard')->with('stream', $stream)->with('news', $news);     
    }
}
