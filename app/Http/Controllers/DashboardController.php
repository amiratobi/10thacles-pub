<?php

namespace App\Http\Controllers;

//use App\Services\Request;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Carbon\Carbon;
/**
* 
*/
class DashboardController extends Controller
{
    
    /*function __construct()
    {
        $this->client = new Request();
    }

    public function index () {
        return view('pages.dashboard.index');
    }*/

    public function index()
    {
		$client = new Client();

		$response = $client->request('GET', 'http://staging.digitizeme.com.ng/apis/divisions-data.php');
		$divisions = json_decode($response->getBody());

		$response = $client->request('GET', 'http://staging.digitizeme.com.ng/apis/panel-data.php?range=today');
		$panelData = json_decode($response->getBody());

		//return $divisions;
		$now = new Carbon();
		$now = $now->toFormattedDateString(); 
		return view('pages.dashboard.index', compact('divisions', 'now', 'panelData'));
    }

    public function displayRange($range)
    {
    	$client = new Client();
    	$rangeUrl = "http://staging.digitizeme.com.ng/apis/panel-data.php?range=".$range;

    	$response = $client->request('GET', 'http://staging.digitizeme.com.ng/apis/divisions-data.php');
		$divisions = json_decode($response->getBody());

		$response = $client->request('GET', $rangeUrl);
		$panelData = json_decode($response->getBody());

		//return $divisions;
		$now = new Carbon();
		$now = $now->toFormattedDateString(); 
		return view('pages.dashboard.index', compact('divisions', 'now', 'panelData'));
    }
}