<?php

namespace App\Models;

/**
* 
*/
class User extends Model
{
    protected $user_url = "api/admin/user";

    public function getUsers(int $count = 10) {
        $url = $this->user_url;
        return $this->response(
            $this->client->get($url, ['count' => $count])
        );
    }

    public function storeUser(array $params) {
        $url = $this->user_url;
        return $this->response(
            $this->client->post($url, $params)
        );
    }

    public function updateUser(array $params) {
        $url = "{$this->user_url}/edit";
        return $this->response(
            $this->client->post($url, $params)
        );
    }
}