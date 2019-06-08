<?php

//https://itsolutionstuff.com/post/laravel-57-create-rest-api-with-authentication-using-passport-tutorialexample.html

namespace App\Http\Controllers\API;

use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\listingstream;
use App\Models\NewsAndUpdates;
use App\Models\Deals;
use Validator;


class SecureController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request)
    {
        $client = new GuzzleHttpClient();
        $input = $request->all();
        $query = array();
        
        if ($input['url']) {

            $url = 'https://api.greyladyproject.com/api/v1/' . $input['url'];

            unset($input['url']);

            foreach ($input as $key => $value) {
                $query[$key] = $value;
            }

            $apiRequest = $client->request('GET', $url, [
                'query' => $query,
                'headers' => ['apiKey' => 'eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ'],
            ]);

            return $apiRequest->getBody()->getContents();

        } else {
            
            return false;
        }
             
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function post(Request $request)
    {
        $client = new GuzzleHttpClient();
        $input = $request->all();
        $query = array();


        if ($input['url']) {

            $url = 'https://api.greyladyproject.com/api/v1/' . $input['url'];

            unset($input['url']);

            foreach ($input as $key => $value) {
                $query[$key] = $value;
            }

            $apiRequest = $client->request('POST', $url, [
                'form_params' => $query,
                'headers' => ['apiKey' => 'eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ'],
            ]);

            return $apiRequest->getBody()->getContents();

        } else {
            
            return false;
        }
             
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bootup(Request $request)
    {
        try {
            $client = new GuzzleHttpClient();
            $input = $request->all();
            $user = auth()->user();
            $query = array();

            $validator = Validator::make($input['details'], [
                'beds' => 'required|numeric|min:1',
                'baths' => 'required|numeric|min:1',
                'price' => 'required|numeric|min:1',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()]);      
            }
            
            $plugin = NewsAndUpdates::select('version', 'download_link')->where('type', 'plugin')->orderBy('id', 'desc')->get()->toArray();        
            $current_chrome_plugin = array(
                'version' => $plugin[0]['version'],
                'download_link' => $plugin[0]['download_link']
            );            

            $url = 'https://api.greyladyproject.com/api/v1/' . $input['url'];

            unset($input['url']);

            if( !array_key_exists('url', $input) ){
                if( sizeof($input) < 1 ){
                    throw new Exception('Request Payload is not present');
                }
            }
            
            foreach ($input as $key => $value) {
                $query[$key] = $value;
            }

            $apiRequest = $client->request('POST', $url, [
                'form_params' => $query,
                'headers' => ['apiKey' => 'eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ'],
            ]);

            $listing = json_decode($apiRequest->getBody()->getContents());

            $location = isset($listing->cretedlistingItemResponse[0]->details->location) ? $listing->cretedlistingItemResponse[0]->details->location : false;
            $source = isset($listing->cretedlistingItemResponse[0]->source) ? $listing->cretedlistingItemResponse[0]->source : false;
            $purchaseType = isset($listing->cretedlistingItemResponse[0]->details->purchaseType) ? $listing->cretedlistingItemResponse[0]->details->purchaseType : false;
            $address = $location->address . ' ' . $location->city . ', ' . $location->state . ' ' . $location->zip;

            $newListingStream = listingstream::create(array(
                'address' => $address,
                'link' => $source->source_pdp,
                'site' => $source->source,
                'purchaseType' => $purchaseType,
                'user_id' => $user->id
            ));

            $response = [
                'api_response' => $listing,
                'version' => $current_chrome_plugin
            ];
            
            return response()->json($response, 200);

        } catch( Exception $ex) {
            return response()->json(['error' => $ex->getMessage()]);
        }          
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createDeals(Request $request)
    {
        try{
            $client = new GuzzleHttpClient();
            $input = $request->all();
            $user = auth()->user();
            $query = array();

            $validator = Validator::make($input['details'], [
                'beds' => 'required|numeric|min:1',
                'baths' => 'required|numeric|min:1',
                'price' => 'required|numeric|min:1',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()]);      
            }

            $url = 'https://api.greyladyproject.com/api/v1/' . $input['url'];

            unset($input['url']);

            if( !array_key_exists('url', $input) ){
                if( sizeof($input) < 1 ){
                    throw new Exception('Request Payload is not present');
                }
            }

            foreach ($input as $key => $value) {
                $query[$key] = $value;
            }

            $apiRequest = $client->request('POST', $url, [
                'form_params' => $query,
                'headers' => ['apiKey' => 'eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ'],
            ]);

            $listing = json_decode($apiRequest->getBody()->getContents());
            $location = isset($listing->cretedlistingItemResponse[0]->details->location) ? $listing->cretedlistingItemResponse[0]->details->location : false;
            $address = $location->address . ' ' . $location->city . ', ' . $location->state . ' ' . $location->zip . ', ' . $location->county;
            $beds = isset($listing->cretedlistingItemResponse[0]->details->beds) ? $listing->cretedlistingItemResponse[0]->details->beds : false;
            $baths = isset($listing->cretedlistingItemResponse[0]->details->baths) ? $listing->cretedlistingItemResponse[0]->details->baths : false;
            $price = isset($listing->cretedlistingItemResponse[0]->details->price) ? $listing->cretedlistingItemResponse[0]->details->price : false;
            $area = isset($listing->cretedlistingItemResponse[0]->details->livingArea) ? $listing->cretedlistingItemResponse[0]->details->livingArea : false;
            $units = isset($listing->cretedlistingItemResponse[0]->details->livingAreaUnits) ? $listing->cretedlistingItemResponse[0]->details->livingAreaUnits : false;
            $living_area = $area . ' ' . $units;

            $deal_name = "New Deal";
            $description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
            $deal = [
                'user_id' => $user->id,
                'name' => $deal_name,
                'property_address' => $address,
                'description' => $description,
                'beds' => $beds,
                'baths' => $baths,
                'price' => $price,
                'living_area' => $living_area
            ];
            $deal = Deals::create($deal);
            
            $response = [
                'api_response' => $listing
            ];

            return response()->json($response, 200);

        } catch( Exception $ex ) {
            return response()->json(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDeals()
    {
        try {
            $deals = Deals::all()->toArray();            
            $response = [
                'api_response' => $deals
            ];

            return response()->json($response, 200);

        } catch( Exception $ex ) {
            return response()->json(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteDeals($id)
    {
        try {
            $deal = Deals::find($id);
            if ( is_null($deal) || $deal->user_id !== Auth::id() ) {
                return $this->sendError('Deal not found.');
            }
            $deal->delete();

            return $this->sendResponse($deal->toArray(), 'Deal deleted successfully.');

        } catch( Exception $ex ) {
            return response()->json(['error' => $ex->getMessage()]);
        }
        
    }
}