<?php 

namespace App\Services;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

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

        switch ($method) {
            case 'GET': 
                $params = array_merge($this->params, ['query' => $params]);
                $response = $this->client->get($url, $params); 
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
        $this->params['auth'] = [null, $token];
    }

    /**
     * @return void
     */
    private function enableDebugging() {
        $this->params['debug'] = (bool) config('app.debug');
    }

}