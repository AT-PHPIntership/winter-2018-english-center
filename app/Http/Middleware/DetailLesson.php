<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class DetailLesson
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
        // $url = explode('/', url()->current());
        // $lessonId = (int)end($url);

        // $maxLesson = Auth::user()->lessons->max('order');
        // if ( $lessonId <= ($maxLesson+1) ) {
            return $next($request);
        // } else {
        //     return abort(404);
        // }
    }
}
