<?php

//https://itsolutionstuff.com/post/laravel-57-create-rest-api-with-authentication-using-passport-tutorialexample.html

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;
use App\Http\Controllers\API\BaseController as BaseController;
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
        $client = new GuzzleHttpClient();
        $input = $request->all();
        $query = array();
        $current_chrome_plugin = array(
            'version' => '0.1.2',
            'download_link' => 'https://drive.google.com/file/d/1STaTZoPu1_BmWvs8K9tFpnQwfnELoWDE/view'
        );


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

            $response = [
                'api_response' => $apiRequest->getBody()->getContents(),
                'version' => $current_chrome_plugin
            ];

            return response()->json($response, 200);

        } else {
            
            return false;
        }
             
    }
}