<?php

namespace App\Http\Middleware;

use Closure;

class AuthMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        return response()->json(['message' => 'No autorizado'], 403);
    }
}
