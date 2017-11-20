<?php

namespace App\Models;

/**
* 
*/
class Role extends Model
{
    
    public function getRoles($params) {
        $url = "api/admin/role";
        return $this->response(
            $this->client->get($url, $params)
        );
    }
}