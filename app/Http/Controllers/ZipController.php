<?php

namespace App\Http\Controllers;

// use App\User;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;

class ZipController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function details($id) {
     
        try {

           $client = new GuzzleHttpClient();

           $apiRequest = $client->request('GET', 'https://gulshan.app.greyladyproject.com/api/v1/zip', [
                'query' => ['zip' => $id],
          ]);

          $content = json_decode($apiRequest->getBody()->getContents());

          // dd($id);
          // dd($content);
          return view('explore-details')->with('zip', $content);

        } catch (RequestException $re) {
          dd($re);
        }

        
    }
}