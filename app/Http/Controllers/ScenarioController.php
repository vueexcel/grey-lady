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

          $data = [];
          $client = new GuzzleHttpClient();
          $scenario_id = request()->get('scenario_id');
          
          $apiRequest = $client->request('GET', 'https://api.greyladyproject.com/api/v1/listings/' . $id, [
            'headers' => ['apiKey' => 'eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ'],
          ]);
          $response = json_decode($apiRequest->getBody()->getContents());
          $listing = $response[0];
          $data['listing'] = $listing;

          $zip = \App\Http\Helpers\ZipAPIHelper::getZipDetails($listing->details->location->zip);
          $data['zip'] = $zip;

          $deal = Deals::where('listing_id', $id);
          if( $deal->count() > 0 ){
            $deal = $deal->first();
            $data['deal'] = $deal->toJson();
            $scenario = Scenario::where('id', $scenario_id)->where('deal_id', $deal->id);
            if( $scenario->count() > 0 ){
              $scenario = $scenario->first();
              $data['scenario'] = $scenario->toJson();
            } else {
              $data['scenario'] = null;
            }
          } else {
            $data['deal'] = null;
          }
          
          return view('scenario.run', $data);

        } catch (RequestException $re) {
          dd($re);
        }
    }
}