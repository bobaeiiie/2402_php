<?php

namespace App\Http\Middleware;

use MyToken;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MyAuth
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
        Log::debug('MyAuth : '.$request->bearerToken());
        MyToken::chkToken($request->bearerToken());
        return $next($request);
    }
}
