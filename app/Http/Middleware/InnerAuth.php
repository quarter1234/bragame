<?php

namespace App\Http\Middleware;

use App\Common\Lib\Result;
use Closure;
use Illuminate\Http\Request;


class InnerAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $XSign = $request->header('X-Signature');
        $token = $request->header('X-Token');
        $authKey = config('inner_auth.key');

        $genSign = md5($token .  $authKey);
        if($XSign !=  $genSign) {
            return Result::error('No Auth!');
        }

        return $next($request);
    }
}
