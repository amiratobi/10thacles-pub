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

    public function yesterday()
    {
		$client = new Client();
		
		$response = $client->request('GET', 'http://staging.digitizeme.com.ng/apis/divisions-data.php');
		$divisions = json_decode($response->getBody());

		$response = $client->request('GET', 'http://staging.digitizeme.com.ng/apis/panel-data.php?range=yesterday');
		$panelData = json_decode($response->getBody());

		//return $divisions;
		$now = new Carbon();
		$now = $now->toFormattedDateString(); 
		return view('pages.dashboard.index', compact('divisions', 'now', 'panelData'));
    }

    public function month()
    {
		$client = new Client();
		
		$response = $client->request('GET', 'http://staging.digitizeme.com.ng/apis/divisions-data.php');
		$divisions = json_decode($response->getBody());

		$response = $client->request('GET', 'http://staging.digitizeme.com.ng/apis/panel-data.php?range=month');
		$panelData = json_decode($response->getBody());

		//return $divisions;
		$now = new Carbon();
		$now = $now->toFormattedDateString(); 
		return view('pages.dashboard.index', compact('divisions', 'now', 'panelData'));
    }

    public function all()
    {
		$client = new Client();
		
		$response = $client->request('GET', 'http://staging.digitizeme.com.ng/apis/divisions-data.php');
		$divisions = json_decode($response->getBody());

		$response = $client->request('GET', 'http://staging.digitizeme.com.ng/apis/panel-data.php?range=all');
		$panelData = json_decode($response->getBody());

		//return $divisions;
		$now = new Carbon();
		$now = $now->toFormattedDateString(); 
		return view('pages.dashboard.index', compact('divisions', 'now', 'panelData'));
    }
}