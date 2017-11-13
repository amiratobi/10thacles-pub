<?php

namespace App\Models;

/**
* 
*/
class Statistic extends Model
{
    public function getInvoicingVolumeDivision() {
        $url = "api/invoicing/volume/division";
        return $this->response(
            $this->client->get($url)
        );
    }

    public function getInvoicingVolume(array $params) {
        // dd($params);
        $url = "api/invoicing/volume";
        $promises = [
            'cash' => $this->client->getAsync($url, $params + ['invoiceType' => 'offline']),
            'card' => $this->client->getAsync($url, $params + ['invoiceType' => 'remita']),
            'cash_pending' => $this->client->getAsync($url, $params + ['invoiceType' => 'offline', 'status' => 'Pending Payment'])
        ];
        
        return $this->asyncResponse($promises);
    }
}