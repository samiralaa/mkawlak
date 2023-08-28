<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifiedAccount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('api/*') && (auth('api')->user()?->code || auth('company')->user()?->code))
            return errorResponseMessage('Please verify your account', 401);

        return $next($request);
    }
}
