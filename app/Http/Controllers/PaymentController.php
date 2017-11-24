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
		$cashiers = (new CashReconcilation)->getCashPerCashier();
    	return view('pages.payments.index', compact('cashiers'));
    }

    public function generateRRR(Request $request, $id = null)
    {
		$cr = new CashReconcilation;
		//get cashiers name
		if($id)
			$name = $cr->getCashierName($id);

		$params = $id ? [["_id" => $id]] : null;
        try {
			if($id)
				$response = $cr->generateRRR($params);
			else
				$response = $cr->generateRRR();
        } catch (\Exception $e) {
            $response = null;
        }
        
        if($id) {
            return view('pages.payments.single', compact('response', 'name'));
        } else {
            return view('pages.payments.all', compact('response'));
        }
    }
}