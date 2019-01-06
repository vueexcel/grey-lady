<?php
namespace App\Http\Helpers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;

class ZipAPIHelper
{
      public static function getZipDetails ( $zip ) 
      {


          try {

             $client = new GuzzleHttpClient();

             $apiRequest = $client->request('GET', 'https://api.greyladyproject.com/api/v1/zip', [
                  'query' => ['zip' => $zip],
                   'headers' => ['apiKey' => 'eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ'],
            ]);

            $content = json_decode($apiRequest->getBody()->getContents());

            $zip = $content;             

            return $zip;

          } catch (RequestException $re) {
            dd($re);
          }

      }

}