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
}