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

    /**
     * [setToken description]
     * @param object $response [description]
     */
    public function setToken($response) {
        \Cookie::queue('access_token', $response->access_token, 60 * 24);
        \Cookie::queue('refresh_token', $response->refresh_token, 60 * 24);
    }
}