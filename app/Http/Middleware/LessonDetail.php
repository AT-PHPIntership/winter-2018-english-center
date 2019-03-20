<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class LessonDetail
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
        $url = explode('/', url()->current());
        $lessonId = (int)end($url);
        $maxLessonCourse5 = Auth::user()->lessons->where('course_id',5)->max('order');
        $maxLessonCourse6 = Auth::user()->lessons->where('course_id',6)->max('order');
        if ( $lessonId <= ($maxLessonCourse5+1) ) {
            return $next($request);
        }
        elseif ( ($lessonId >5) && ($lessonId-5) <= ($maxLessonCourse6+1) ) {
            return $next($request);
        }
        return abort(404);
    }
}
