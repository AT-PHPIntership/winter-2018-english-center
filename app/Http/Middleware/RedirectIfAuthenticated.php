<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request Request
     * @param \Closure                 $next    Closure
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
