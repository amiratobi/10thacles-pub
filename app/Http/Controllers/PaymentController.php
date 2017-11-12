<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function index()
    {
    	$client = new Client();

		$response = $client->request('GET', 'http://staging.digitizeme.com.ng/apis/pending-cash.php');
		$tellers = json_decode($response->getBody());
    	return view('pages.payments.index', compact('tellers'));
    }

    public function genSingleRRR($index)
    {
    	$client = new Client();

    	$response = $client->request('GET', 'http://staging.digitizeme.com.ng/apis/pending-cash.php');
		$tellers = json_decode($response->getBody());

		$selectedTeller = $tellers[$index];
		
    	$merchantId = "2547916";
    	$serviceTypeId = "4430731";
    	$apiKey = "1946";
    	$totalAmount = $selectedTeller->pending_cash;
    	$payerName = $selectedTeller->name;
    	$payerEmail = $selectedTeller->email;
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

		return view('pages.payments.single', compact('selectedTeller', 'jsonPost', 'remitaResponse'));
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

		return view('pages.payments.all', compact('totalAmount', 'remitaResponse'));
    }
}

/*{ 
      "merchantId":"2547933", 
      "serviceTypeId":"35457353800", 
      "totalAmount":"7000",
      "hash":"9980c10768896f34d1bb202a45e53879122c01c1e01639d3e5ab90bad63ae37d2774",
      "payerName":"Oshadami Mike",
      "payerEmail":"oshadami@example.com",
      "payerPhone":"08012345678",
      "orderId":"POS3455J2",
      "responseurl":"www.yourresponseurl.com",
      "lineItems":[
                        {"lineItemsId":"itemid1","beneficiaryName":"Oshadami Mike",
                        "beneficiaryAccount":"0360883515","bankCode":"058","beneficiaryAmount":"7000","deductFeeFrom":"1"}
                       ]
}

jsonp({"statuscode":"025","RRR":"320007654464","orderID":"fmc1509501749","status":"Payment Reference generated"})
*/