<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SignatureMiddleware
{

    public function handle(Request $request, Closure $next, $header = 'X-Name')
    {
        $response = $next($request);
        $response->headers->set($header, config('app.name'));
        return $response;
    }
}
