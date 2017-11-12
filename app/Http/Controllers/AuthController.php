<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Request as Client;

/**
* Controller Class for Authentication
*/
class AuthController extends Controller
{
    use \App\Services\Response;

    protected $auth_url = '/auth/token';

    function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @return Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('pages.auth.login');
    }

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
            $response = $this->response(
                $this->client->post($this->auth_url, $params)
            );
            $this->setToken($response);
        } catch (\Exception $e) {
            return back()->withError("Unable to login, please check your credentials or try again later");
        }
        return redirect('/');
    }

    /**
     * [logout description]
     * @return [type] [description]
     */
    public function logout() {
        \Cookie::queue(\Cookie::forget('access_token'));
        return redirect('/login');
    }
}