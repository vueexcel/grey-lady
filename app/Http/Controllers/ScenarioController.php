<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;
use Carbon\Carbon;
use App\Models\Deals;
use App\Models\Scenario;

class ScenarioController extends Controller
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
    public function run($id) {

        try {

          $client = new GuzzleHttpClient();
          $scenario_id = request()->get('scenario_id');
          
          $apiRequest = $client->request('GET', 'https://api.greyladyproject.com/api/v1/listings/' . $id, [
            'headers' => ['apiKey' => 'eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ'],
          ]);
          $response = json_decode($apiRequest->getBody()->getContents());
          $listing = $response[0];

          $zip = \App\Http\Helpers\ZipAPIHelper::getZipDetails($listing->details->location->zip);
          $deal = Deals::where('listing_id', $id)->first();
          $scenario = Scenario::where('id', $scenario_id)->where('deal_id', $deal->id)->first();
          
          return view('scenario.run', [
            'listing' => $listing, 
            'zip' => $zip, 
            'deal' => $deal->toJson(), 
            'scenario' => $scenario->toJson()
          ]);

        } catch (RequestException $re) {
          dd($re);
        }
    }
}