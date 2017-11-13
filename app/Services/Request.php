<?php 

namespace App\Services;

use GuzzleHttp\{
    Exception\GuzzleException,
    Client, Promise, Middleware
};

/**
* 
*/
class Request
{
    private $client;

    protected $params = [];
    
    function __construct()
    {
        $this->client = new Client([
            'base_uri' => env('API_URL')
        ]);
        $this->attachAuthHeader();
        $this->enableDebugging();
    }

    /**
     * @param  string $method
     * @param  string $url
     * @param  array $params
     * @return [type]
     */
    private function request(string $method, string $url, array $params) {
        // Grab the client's handler instance.
        $clientHandler = $this->client->getConfig('handler');
        // Create a middleware that echoes parts of the request.
        $tapMiddleware = Middleware::tap(function ($request) {
            // echo $request->getHeaderLine('Content-Type');
            // // application/json
            // echo $request->getBody();
            //  // {"foo":"bar"}
            // dd($request->getHeaderLine('Authorization'));
        });
        switch ($method) {
            case 'GET': 
                $params = array_merge($this->params, ['query' => $params, 'handler' => $tapMiddleware($clientHandler)]);
                $response = $this->client->get($url, $params); 
                break;
            case 'GET_ASYNC': 
                $params = array_merge($this->params, ['query' => $params, 'handler' => $tapMiddleware($clientHandler)]);
                $response = $this->client->getAsync($url, $params); 
                break;
            case 'POST': 
                $params = array_merge($this->params, ['json' => $params]);
                $response = $this->client->post($url, $params); 
                break;
            default:
                # code...
                break;
        }

        return $response;
    }

    /**
     * @param  string $url
     * @param  array $params
     * @return [type]
     */
    public function get(string $url, array $params = []) {
        return $this->request('GET', $url, $params);
    }

    public function getAsync(string $url, array $params = []) {
        return $this->request('GET_ASYNC', $url, $params);
    }

    /**
     * @param  string $url
     * @param  array $params
     * @return [type]
     */
    public function post(string $url, array $params = []) {
        return $this->request('POST', $url, $params);
    }

    /**
     * @return void
     */
    private function attachAuthHeader() {
        $token = \Cookie::get('access_token');
        $this->params['headers'] = [
            'Authorization' => "Bearer {$token}"
        ];
    }

    /**
     * @return void
     */
    private function enableDebugging() {
        $this->params['debug'] = (bool) env('GUZZLE_DEBUG');
    }

}