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
        $client = new GuzzleHttpClient();

        $news = DB::table('news_and_updates')->get();
        $news = json_encode(json_decode($news, true));
        $user = auth()->user();
        $username = $user->email;
        $password = $request->session()->get('plain_password');

        $url = 'https://app.greyladyproject.com/api/user/all';
        $urlToken = 'https://app.greyladyproject.com/oauth/token';
        $urlListing = 'https://api.greyladyproject.com/api/v1/listings';

        $tokenRequest = $client->request('POST', $urlToken, [
            'form_params' => [
                'username' => $username,
                'password' => $password,
                'grant_type' => 'password',
                'client_id' => env('CLIENT_ID'),
                'client_secret' => env('CLIENT_SECRET')
            ],
        ]);

        $response = json_decode($tokenRequest->getBody()->getContents(), true);                

        $listingRequest = $client->request('GET', $urlListing, [
            'headers' => [
                'apiKey' => 'eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ',
                'Authorization' => $response['token_type'] . " " . $response['access_token']
            ],
        ]);
        
        $apiRequest = $client->request('GET', $url, [
            'headers' => [
                'Authorization' => $response['token_type'] . " " . $response['access_token']
            ],
        ]);

        
        
        $listing = $apiRequest->getBody()->getContents();
        $fav_listing = json_decode($listing, true)['data']['favorite_listings'];
        

        $listingResponse = $listingRequest->getBody()->getContents();        
        // $fav_listing_all = json_decode($listingResponse, true)['items'];
        // echo "<pre>";
        // print_r($fav_listing_all);die;
        // $responseList = [];
        // foreach( $fav_listing_all as $listAll ){
        //     foreach( $fav_listing as $list ){
        //         if( $listAll['id'] == $list['id'] ){
        //             $responseList[] = $listAll;
        //         }
        //     }
        //     echo $listAll['id'] . "<br>";

        // }
        // echo "<pre>";
        // print_r($responseList);die;
        
        return view('dashboard')
                ->with('stream', $listing)
                ->with('news', $news);
                // ->with('streamData', $listingResponse);
    }
}
