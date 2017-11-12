<?php

namespace App\Services;

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

    /**
     * [setToken description]
     * @param object $response [description]
     */
    public function setToken($response) {
        \Cookie::queue('access_token', $response->access_token, 60 * 24);
        \Cookie::queue('refresh_token', $response->refresh_token, 60 * 24);
    }
}