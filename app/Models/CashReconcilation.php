<?php

namespace App\Models;

/**
* 
*/
class CashReconcilation extends Model
{
    public function getCashPerCashier() {
        $url = "api/invoicing/cash/pending";
        return $this->response(
            $this->client->get($url)
        );
    }

    public function generateRRR(array $cashiers = []) {
        $url = "api/invoicing/cash/pending/rrr";
        return $this->response(
            $this->client->post($url, ['cashiers' => $cashiers])
        );
    }
}