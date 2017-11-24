<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Statistic;
/**
* 
*/
class DashboardController extends Controller
{

    public function index(Request $request)
    {
        // checking permissions
        // @todo: refactor to roles middleware
        if(!hasClaim('can-manage-own-merchant')) return redirect("/user");
        
        // instantiate needed classes
        $statistic = new Statistic;
        $carbon = new Carbon;

        // retrieve the invoice info per division
        $divisions = $statistic->getInvoicingVolumeDivision();

        // retrieve the invoice volume overview
        switch ($request->get('range')) {
            case 'yesterday': 
                $params = [$carbon->yesterday()->startOfDay(), $carbon->yesterday()->endOfDay()]; break;
            case 'month': 
                $params = [$carbon->today()->startOfMonth(), $carbon->today()->endOfMonth()]; break;
            case 'all': 
                $params = [$carbon->today()->startOfCentury(), $carbon->today()->endOfCentury()]; break;
            default: 
                $params = [$carbon->today(), $carbon->today()->endOfDay()]; break;
        }
        $params = ['start' => $params[0]->toIso8601String(), 'end' => $params[1]->toIso8601String()];
        $panelData = $statistic->getInvoicingVolume($params);

        
        return view('pages.dashboard.index', compact('divisions', 'now', 'panelData'));
    }
}