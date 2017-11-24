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

    public function getCashierName($id)
    {
        $cashiers = $this->getCashPerCashier();
        foreach($cashiers as $cashier)
        {
            if($id ==  $cashier->_id)
            return $cashier->cashier->username;
        }
        return null;
    }
}