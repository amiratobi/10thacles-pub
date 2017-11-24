<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\{
    User, Role
};

class UserController extends Controller
{
    public function index(Request $request)
    {
		$users = (new User)->getUsers((int) $request->get('count', 100));
        $roles = cache()->rememberForever('user_roles', function() {
            $roles = (new Role)->getRoles(['count' => 100000]);
            if(!empty($roles->items)) {
                return $roles->items;
            }
        }) ?: [];
        
        $users = $users ? array_map(function($user) use ($roles) {
            $key = array_search(array_get($user->roles, 0), array_column($roles, '_id'));
            $user->role = $key ? $roles[$key]->name : "";
            return $user;
        }, $users->items) : [];
		return view('pages.users.index', compact('users'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:5',
            'email' => 'required',
            'roles' => 'required'
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
        $roles = config("constants.roles");
    	return view('pages.users.add', compact('roles'));
    }

}
