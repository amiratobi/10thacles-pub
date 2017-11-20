<?php

namespace App\Models;

/**
* 
*/
class PayItem extends Model
{
    public function getItems(array $params = []) {
        $url = "api/admin/config";
        return $this->response(
            $this->client->get($url, $params)
        );
    }
}