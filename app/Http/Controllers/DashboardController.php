<?php

namespace App\Http\Controllers;

/**
* 
*/
class DashboardController extends Controller
{
    
    function __construct()
    {
        # code...
    }

    public function index () {
        return view('pages.dashboard.index');
    }
}