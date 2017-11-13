<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Statistic;
use GuzzleHttp\Client;
/**
* 
*/
class DashboardController extends Controller
{
    use \App\Services\Response;

    public function index(Request $request)
    {
        $statistic = new Statistic;
        $carbon = new Carbon();

        $divisions = $statistic->getInvoicingVolumeDivision();

        switch ($request->get('range')) {
            case 'yesterday': 
                $params = [$carbon->yesterday()->startOfDay(), $carbon->yesterday()->endOfDay()]; break;
            case 'month': 
                $params = [$carbon->today()->startOfMonth(), $carbon->today()->endOfMonth()]; break;
            case 'all': 
                $params = [$carbon->today()->startOfCentury(), $carbon->today()->endOfCentury()]; break;
            default: 
                $params = [$carbon->today(), $carbon->tomorrow()]; break;
        }
        $params = [
            'start' => $params[0]->toIso8601String(), 
            'end' => $params[1]->toIso8601String()
        ];
        $panelData = $statistic->getInvoicingVolume($params);

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