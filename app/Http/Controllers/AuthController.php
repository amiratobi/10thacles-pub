<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
* Controller Class for Authentication
*/
class AuthController extends Controller
{

    function __construct()
    {
        # code...
    }

    /**
     * @return Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('pages.auth.login');
    }
}