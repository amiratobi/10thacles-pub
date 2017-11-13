<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auth;

/**
* Controller Class for Authentication
*/
class AuthController extends Controller
{
    /**
     * @return Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('pages.auth.login');
    }

    /**
     * [login description]
     * @param  Request $request
     * @return redirect()
     */
    public function login(Request $request) {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);
        $params = [
            'username' => $request->get('username'),
            'password' => $request->get('password'),
            'grant_type' => 'password',
            'client_id' => config('app.CLIENT_ID'),
            'client_secret' => config('app.CLIENT_SECRET'),
            'scope' => config('app.CLIENT_SCOPE')
        ];
        try {
            $auth = new Auth;
            $response = $auth->getToken($params);
            $auth->setToken($response);
        } catch (\Exception $e) {
            return back()->withError("Unable to login, please check your credentials or try again later");
        }
        return redirect('/');
    }

    /**
     * [logout description]
     * @return redirect()
     */
    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}