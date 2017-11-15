<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
		$users = (new User)->getUsers(
            (int) $request->get('count', 100)
        );
        $users = $users ? $users->items : [];
		$now = (new Carbon)->toFormattedDateString(); 
		return view('pages.users.index', compact('users', 'now'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required,min:5',
            'email' => 'required'
        ]);
        $params = $request->only([
            'username', 'password', 'firstName', 'lastName', 'email', 'phone', 'domain', 'roles'
        ]);
        try {
            $user = (new User)->storeUser($params);
        } catch (\Exception $e) {
            return back()->withError("Unable to add user");
        }
        return back()->withMessage("User added!");
    }

    public function create()
    {
    	return view('pages.users.add');
    }

}
