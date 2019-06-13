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
use App\Models\Scenario;
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
    public function updateDeals($id)
    {
        try {
            $data = request()->all();
            if( array_key_exists('name', $data) ){
                $validator = Validator::make($data, [
                    'name' => 'required',
                ]);

                if ($validator->fails()) {
                    return response()->json(['error' => $validator->errors()]);      
                }
            }

            $userid = Auth::id();
            $deal = Deals::find($id);
            if ( is_null($deal) ) {
                return $this->sendError('Deal not found.');
            } else {
                if( $deal->user_id != $userid ){
                    return $this->sendError('Deal not found.');
                }
            }

            if( array_key_exists('name', $data) ){
                $deal->name = $data['name'];
            }
            if( array_key_exists('description', $data) ){
                $deal->description = $data['description'] ? $data['description'] : "";
            }
            $deal->save();

            return $this->sendResponse($deal->toArray(), 'Deal updated successfully.');

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
            $userid = Auth::id();
            $scenarios = Scenario::where('deal_id', $id)->get();

            if ( is_null($deal) ) {
                return $this->sendError('Deal not found.');
            } else {
                if( $deal->user_id != $userid ){
                    return $this->sendError('Deal not found.');
                }
            }

            $deal->delete();
            if( sizeof($scenarios->toArray()) > 0 ){
                Scenario::where('deal_id', $id)->delete();
            }

            return $this->sendResponse($deal->toArray(), 'Deal deleted successfully.');

        } catch( Exception $ex ) {
            return response()->json(['error' => $ex->getMessage()]);
        }
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createScenario()
    {
        try {
            $data = request()->all();
            $validator = Validator::make($data, [
                'deal_id' => 'required',
                'scenario_name' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()]);      
            }   

            $scenario = Scenario::where('scenario_name', $data['scenario_name']);

            if( $scenario->count() > 0 ){
                return response()->json([ 'data' => $scenario->get()->toArray(), 'message' => 'Scenario Already Exist.']);
            }

            $scenario = Scenario::create($data);
            return $this->sendResponse($scenario, 'Scenario Created successfully.');

        } catch( Exception $ex ) {
            return response()->json(['error' => $ex->getMessage()]);
        }      
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteScenario($id)
    {
        try {
            $scenario = Scenario::find($id);
            if ( is_null($scenario) ) {
                return $this->sendError('Scenario not found.');
            }
            $scenario->delete();

            return $this->sendResponse($scenario->toArray(), 'Scenario deleted successfully.');

        } catch( Exception $ex ) {
            return response()->json(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateScenario($id)
    {
        try {
            $data = request()->all();
            if( array_key_exists('scenario_name', $data) ){
                $validator = Validator::make($data, [
                    'scenario_name' => 'required',
                ]);

                if ($validator->fails()) {
                    return response()->json(['error' => $validator->errors()]);      
                }
            }

            $userid = Auth::id();
            $scenario = Scenario::find($id);
            if ( !is_null($scenario) ) {
                $deal = Deals::where([ ['id', '=', $scenario->deal_id], ['user_id', '=', $userid] ])->get();
                if ( sizeof($deal->toArray()) < 1 ) {
                    return $this->sendError('Scenario not found.');
                }
            } else {
                return $this->sendError('Scenario not found.');
            }

            if( array_key_exists('scenario_name', $data) ){
                $scenario->scenario_name = $data['scenario_name'];
            }
            if( array_key_exists('scenario_notes', $data) ){
                $scenario->scenario_notes = $data['scenario_notes'] ? $data['scenario_notes'] : "";
            }
            $scenario->save();

            return $this->sendResponse($scenario->toArray(), 'Scenario updated successfully.');

        } catch( Exception $ex ) {
            return response()->json(['error' => $ex->getMessage()]);
        }
    }


}