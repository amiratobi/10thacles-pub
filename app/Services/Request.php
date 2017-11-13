<?php 

namespace App\Services;

use GuzzleHttp\{
    Exception\GuzzleException,
    Exception\ClientException,
    Exception\ConnectException,
    Handler\CurlHandler, HandlerStack, 
    Psr7\Request as GuzzleRequest, Psr7\Response,
    Client, Promise, Middleware
};

use App\Models\Auth;

/**
* 
*/
class Request
{
    private $client;

    protected $params = [];
    
    function __construct()
    {
        $handlerStack = HandlerStack::create(new CurlHandler());
        $handlerStack->push(Middleware::retry($this->retryDecider(), $this->retryDelay()));
        $this->client = new Client([
            'base_uri' => env('API_URL'),
            'handler' => $handlerStack
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
        try {
            switch ($method) {
                case 'GET': 
                    $params = array_merge($this->params, ['query' => $params]);
                    $response = $this->client->get($url, $params); 
                    break;
                case 'GET_ASYNC': 
                    $params = array_merge($this->params, ['query' => $params]);
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
        }
        // catch API errors
        // @todo: better manage for non token related errors
        catch (\Exception $e) {
            \Log::error("Guzzle Error: {$e->getMessage()}");
            Auth::logout();
            return redirect("/login")->withError("Unable to process request");
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
     * @param  string $url    [description]
     * @param  array  $params [description]
     * @return [type]         [description]
     */
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

    /**
     * returns closure which returns boolean for wether a request
     * should be retried or not
     * @return Closure [description]
     */
    private function retryDecider()
    {
        return function (
            $retries,
            GuzzleRequest $request,
            Response $response = null,
            RequestException $exception = null
        ) {
            // Limit the number of retries to 2
            if ($retries >= 2) {
                return false;
            }

            // Retry connection exceptions
            if ($exception instanceof ConnectException) {
                return true;
            }

            if ($response) {
                // Retry on server errors
                if ($response->getStatusCode() == 401 && $retries < 2) {
                    $auth = new Auth;
                    try {
                        $response = $auth->refreshToken();
                        $auth->setToken($response);
                    } catch (Exception $e) {
                        \Log::error($e->getMessage());
                    }
                    return true;
                }
            }

            return false;
        };
    }

    /**
     * delay 1s 2s 3s 4s 5s
     *
     * @return Closure
     */
    private function retryDelay()
    {
        return function ($numberOfRetries) {
            return 1000 * $numberOfRetries;
        };
    }

}