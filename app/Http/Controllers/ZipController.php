<?php

namespace App\Http\Controllers;

// use App\User;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;
use Carbon\Carbon;

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

          if (isset($content[0]->watchlist->rent) && isset($content[0]->watchlist->rent->lastCrawl)) {
              
              $formatted_time = str_replace("T", " ", $content[0]->watchlist->rent->lastCrawl);
              $formatted_time = str_replace("Z", "", $formatted_time);
              $formatted_time = explode(".", $formatted_time)[0];
              $content[0]->watchlist->rent->lastCrawlFormatted = $formatted_time;
          }

          if (isset($content[0]->watchlist->sell) && isset($content[0]->watchlist->sell->lastCrawl)) {
              
              $formatted_time = str_replace("T", " ", $content[0]->watchlist->sell->lastCrawl);
              $formatted_time = str_replace("Z", "", $formatted_time);
              $formatted_time = explode(".", $formatted_time)[0];
              $content[0]->watchlist->sell->lastCrawlFormatted = $formatted_time;
          }
          

          // dd($id);
          // dd($content);
          return view('explore-details')->with('zip', $content);

        } catch (RequestException $re) {
          dd($re);
        }

        
    }
}