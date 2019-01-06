<?php

namespace App\Http\Controllers;

// use App\User;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;
use Carbon\Carbon;

class ListingController extends Controller
{
    

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function details($id) {

        try {

           $client = new GuzzleHttpClient();

           $apiRequest = $client->request('GET', 'https://api.greyladyproject.com/api/v1/listings/' . $id, [
                 'headers' => ['apiKey' => 'eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ'],
          ]);

          $response = json_decode($apiRequest->getBody()->getContents());
          $listing = $response[0];

          $zip = \App\Http\Helpers\ZipAPIHelper::getZipDetails($listing->details->location->zip);

          return view('listings.details.base', ['listing' => $listing, 'zip' => $zip]);

        } catch (RequestException $re) {
          dd($re);
        }

        
    }
}