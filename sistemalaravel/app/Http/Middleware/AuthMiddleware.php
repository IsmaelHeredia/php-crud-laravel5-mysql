<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Closure;

class AuthMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->guest()) {
            return redirect('ingreso');
        }

        return $next($request);
    }
}