<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class LessonDetail
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request request
     * @param \Closure                 $next    next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $url = explode('/', url()->current());
        $lessonId = (int) end($url);
        if (($lessonId)%5 === 0) {
            $courseId = (int) ($lessonId/5 +4);
        } else {
            $courseId = (int) ($lessonId/5 +5);
        }
        $role = Auth::user()->role->name;
        $maxLessonCourse = Auth::user()->lessons->where('course_id', $courseId)->max('order');
        if (($lessonId <= ($maxLessonCourse+1))||(($lessonId-1)%5 === 0)|| ($role === 'Admin')) {
            return $next($request);
        }
        return abort(401);
    }
}
