<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
		$client = new Client();

		$response = $client->request('GET', 'http://staging.digitizeme.com.ng/apis/user-data.php');
		$users = json_decode($response->getBody());

		//return $divisions;
		$now = new Carbon();
		$now = $now->toFormattedDateString(); 
		return view('pages.users.index', compact('users', 'now'));
    }

    public function create()
    {
    	return view('pages.users.add');
    }

}
