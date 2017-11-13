<?php

namespace App\Services;

use GuzzleHttp\Promise;

/**
 * 
 */
Trait Response
{
    public function response($request) {
        $response = [];
        if($request->getStatusCode() === 200)
            $response = json_decode($request->getBody());
        return $response;
    }

    public function asyncResponse($promises) {
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