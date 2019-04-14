<?php
namespace App\Services;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use App\Models\Rating;

class StastiticalService
{
    /**
     * Function index getdata statisticals
     *
     * @return App\Services\StastiticalService
    **/
    public function getData()
    {
        $totalCourses = Course::all()->count();
        $totalLessons = Lesson::all()->count();
        $totalUsers = User::all()->count();
        $avgRating = Rating::avg('star');
        $maxCourseUser = \DB::table('courses')
                        ->join('course_user', 'courses.id', '=', 'course_user.course_id')
                        ->select('courses.name', \DB::raw('count(*) as total'))
                        ->groupBy('courses.id')
                        ->orderBy('total', 'desc')
                        ->limit(5)
                        ->get();
        $statistical = [
            'totalCourses' => $totalCourses,
            'totalLessons' => $totalLessons,
            'totalUsers' => $totalUsers,
            'maxCourseUser' => $maxCourseUser,
            'avgRating' => $avgRating,
        ];
        return $statistical;
    }
}
