<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PayItem;


class PayitemController extends Controller
{
    public function index() {
        try {
            $items = (new PayItem)->getItems();
        } catch (\Exception $e) {
            $items = [];
        }
        return view('pages.payitems.index', compact('items'));
    }

    public function store(Request $requst) {

    }
}
