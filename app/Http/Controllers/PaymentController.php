<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\CashReconcilation;

class PaymentController extends Controller
{
    public function index()
    {
		$tellers = (new CashReconcilation)->getCashPerCashier();
    	return view('pages.payments.index', compact('tellers'));
    }

    public function generateRRR(Request $request, $id = null)
    {
    	$cr = new CashReconcilation;
        $params = $id ? [$id] : null;
        try {
            $remitaResponse = $cr->generateRRR($params);
        } catch (\Exception $e) {
            $remitaResponse = null;
        }
        
        if($id) {
            return view('pages.payments.single', compact('selectedTeller', 'jsonPost', 'remitaResponse'));
        } else {
            return view('pages.payments.all', compact('totalAmount', 'remitaResponse'));
        }
    }

     public function genAllRRR()
    {
    	$client = new Client();

    	$response = $client->request('GET', 'http://staging.digitizeme.com.ng/apis/pending-cash.php');
		$tellers = json_decode($response->getBody());

		$totalAmount = 0;
		foreach ($tellers as $teller) {
			$totalAmount += $teller->pending_cash;
		}
		
    	$merchantId = "2547916";
    	$serviceTypeId = "4430731";
    	$apiKey = "1946";
    	$payerName = "FMC Abeokuta";
    	$payerEmail = "fmc@abeokuta.ng";
    	$payerPhone = "08082237728";
    	$now = new Carbon();
    	$orderId = "fmc" . $now->timestamp;
    	$responseurl = "www.none.com";
    	$concatString = $merchantId.$serviceTypeId.$orderId.$totalAmount.$responseurl.$apiKey;
    	$hash = hash('SHA512', $concatString);
    	$beneficiaryName = "FMC Abeokuta";
    	$beneficiaryAccount = "0360883515";

    	$jsonPost = '{
    		"merchantId":"'. $merchantId .'",
    		"serviceTypeId":"'. $serviceTypeId . '",
    		"totalAmount":"'. $totalAmount . '",
    		"hash":"'. $hash . '",
    		"payerName":"'. $payerName . '",
    		"payerEmail":"'. $payerEmail . '",
    		"payerPhone":"'. $payerPhone . '",
    		"orderId":"'. $orderId . '",
    		"responseurl":"'. $responseurl . '",
    		"lineItems":[
    			{
    				"lineItemsId":"itemid1",
    				"beneficiaryName":"'. $beneficiaryName . '",
    				"beneficiaryAccount":"'. $beneficiaryAccount . '",
    				"bankCode":"232",
    				"beneficiaryAmount":"'. $totalAmount . '",
    				"deductFeeFrom":"1"
    			}
    		]
    	}';

    	$response = $client->request('POST', 'http://www.remitademo.net/remita/ecomm/split/init.reg', [
    		'body' => $jsonPost,
    		'headers' => ['Content-Type' => 'application/json']
    	]);
    	$rawResponse = $response->getBody();
    	$rawResponse = substr($rawResponse, strpos($rawResponse, '{'));
    	$rawResponse = chop($rawResponse, ')' );
    	$remitaResponse = json_decode($rawResponse);

		
    }
}