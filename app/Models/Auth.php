<?php

namespace App\Models;

/**
* 
*/
class Auth extends Model
{
    protected $auth_url = '/auth/token';

    public function getToken($params) {
        return $this->response(
            $this->client->post($this->auth_url, $params)
        );
    }

    public function refreshToken() {
        $params = [
            "grant_type" => "refresh_token",
            "refresh_token" => \Cookie::get('refresh_token'),
            'client_id' => config('app.CLIENT_ID'),
            'client_secret' => config('app.CLIENT_SECRET'),
            'scope' => config('app.CLIENT_SCOPE')
        ];
        return $this->response(
            $this->client->post($this->auth_url, $params)
        );
    }

    public static function logout() {
        \Cookie::queue(\Cookie::forget('access_token'));
    }

    /**
     * [setToken description]
     * @param object $response [description]
     */
    public function setToken($response) {
        if (
            is_object($response) 
            && $response->access_token
            && $response->refresh_token
        ) {
           \Cookie::queue('access_token', $response->access_token, 60 * 24);
            \Cookie::queue('refresh_token', $response->refresh_token, 60 * 24); 
        }
    }
}