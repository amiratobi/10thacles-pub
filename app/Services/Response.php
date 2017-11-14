<?php

namespace App\Services;

use GuzzleHttp\{
    Promise, Psr7\Response as GuzzleResponse
};

use App\Models\Auth;

/**
 * 
 */
Trait Response
{
    public function response($response) {
        $res = [];
        if($response && $response->getStatusCode() === 200) 
            $res = json_decode($response->getBody());
        return $res;
    }

    public function asyncResponse($promises) {
        try {
            $results = Promise\unwrap($promises);
            $results = Promise\settle($promises)->wait();  
        } catch (\Exception $e) {
            \Log::error("Error: {$e->getMessage()}");
            Auth::logout();
            return redirect("/login")->withError("Unable to process request");
        }
        $results = Promise\unwrap($promises);
        $results = Promise\settle($promises)->wait();
        $data = [];
        foreach ($results as $key => $value) {
            if($value['state']=='fulfilled'){
                $body = $value['value']->getBody();
                $data[$key] = json_decode($body);
            } else if($value['state']=='rejected') {
                $response = $value['reason']->getResponse();
                $code = $response->getStatusCode();
                $phrase = $response->getReasonPhrase();
                $data[$key] = ["error" => $code.' '.$phrase];
            }
        }
        return $data;
    }
}