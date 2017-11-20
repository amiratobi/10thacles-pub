<?php

namespace App\Http\Middleware;

use Closure;

class HasToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = getUser()->access_token;
        if(!$token) return redirect('/login')->withError("You need to log in first!");
        return $next($request);
    }
}
