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
        $userid = auth()->id();
        $news = DB::table('news_and_updates')->get()->toJson();
        $stream = DB::table('listingstream')->where('user_id', $userid)->get()->toJson();        
        return view('dashboard')->with('stream', $stream)->with('news', $news);     
    }
}
