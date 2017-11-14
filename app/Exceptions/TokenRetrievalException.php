<?php

namespace App\Exceptions;

class TokenRetrievalException extends \Exception
{

    public function __toString()
    {
        __toString("Unable to retrieve token"); 
    }

}