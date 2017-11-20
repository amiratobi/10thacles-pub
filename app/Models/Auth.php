<?php

namespace App\Models;

/**
* 
*/
class Auth extends Model
{
    protected $auth_url = '/auth/token';
    protected $user_key = 'user_details';

    /**
     * [getToken description]
     * @param  array  $params
     * @return object
     */
    public function getToken(array $params = []) {
        return $this->response(
            $this->client->post($this->auth_url, $params)
        );
    }


    /**
     * [refreshToken description]
     * @return object
     */
    public function refreshToken() {
        $params = [
            "grant_type" => "refresh_token",
            "refresh_token" => getUser()->refreshToken,
            'client_id' => config('app.CLIENT_ID'),
            'client_secret' => config('app.CLIENT_SECRET'),
            'scope' => config('app.CLIENT_SCOPE')
        ];
        return $this->response(
            $this->client->post($this->auth_url, $params)
        );
    }


    /**
     * [logout description]
     * @return void
     */
    public function logout() {
        \Cookie::queue(\Cookie::forget($this->user_key));
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
            $timeToExpire = 60 * 24;
            \Cookie::queue($this->user_key, json_encode($response), $timeToExpire);
        }
    }

    /**
     * [getUser description]
     * @return Object [User]
     */
    public function getUser() {
        $user = json_decode(\Cookie::get($this->user_key));
        return $user;
    }
}