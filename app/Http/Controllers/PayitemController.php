<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payitem;


class PayitemController extends Controller
{
    public function index() 
    {
        return view('pages.payitems.index');
    }
}
