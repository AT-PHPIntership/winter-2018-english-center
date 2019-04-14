<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request Request
     * @param \Closure                 $next    Routing
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->is_actived == 1) {
                return $next($request);
            } else {
                Auth::logout();
                return redirect('login')->with('warning', __('layout_user.login.active'));
            }
        } else {
            return redirect('login')->with('warning', __('layout_user.login.warning'));
        }
    }
}
