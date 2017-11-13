<?php

namespace App\Models;

use App\Services\{
    Response,
    Request as Client
};

/**
* 
*/
class Model
{
    use Response;

    public function __construct() {
        $this->client = new Client();
    }
}