<?php

namespace App\Http\Controllers;

use App\Services\Request;

/**
* 
*/
class DashboardController extends Controller
{
    
    function __construct()
    {
        $this->client = new Request();
    }

    public function index () {
        return view('pages.dashboard.index');
    }
}