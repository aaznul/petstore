<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Apidemo extends Controller
{
    //
    public function index(Request $request)
    {
        $response = \Guzzle::get('https://mpt.i906.my/mpt.json?code=sgr-9');
        $content = json_decode($response->getBody(),true);
        
        if($content['meta']['code'] == 200 ) // if OK
        {
            $provider = $content['response']['provider'];
            $place = $content['response']['place'];
            $ptime = $content['response']['times'];

            return response()
             ->view(
                'apidemo/index',
                compact('provider','place','ptime')
             );
        }
        else {
            return "Request failed";
        }
        
    }
}
