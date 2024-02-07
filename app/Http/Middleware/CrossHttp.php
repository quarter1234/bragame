<?php

namespace App\Http\Middleware;

use Closure;

class CrossHttp
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
        return  $next($request)->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Cookie, X-CSRF-TOKEN, Accept, Authorization, X-XSRF-TOKEN, X-REQUEST-WITH, ACCESSTOKEN')
            ->header('Access-Control-Expose-Headers', 'Authorization, authenticated')
            ->header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS,PUT, DELETE')
            ->header('Access-Control-Allow-Credentials', 'true');
    }
}
