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
        $totalRatingCourses = Rating::all()->count();
        $maxCourseUser = \DB::table('courses')
                        ->join('course_user', 'courses.id', '=', 'course_user.course_id')
                        ->select('courses.name', \DB::raw('count(*) as total'))
                        ->groupBy('courses.id')
                        ->orderBy('total', 'desc')
                        ->limit(5)
                        ->get();
        if (head($maxCourseUser) == null) {
            $statistical = [
                'totalCourses' => $totalCourses,
                'totalLessons' => $totalLessons,
                'totalUsers' => $totalUsers,
                'totalRatingCourses' => $totalRatingCourses,
            ];
        } else {
            $statistical = [
                'totalCourses' => $totalCourses,
                'totalLessons' => $totalLessons,
                'totalUsers' => $totalUsers,
                'maxCourseUser' => $maxCourseUser,
                'totalRatingCourses' => $totalRatingCourses,
            ];
        }
        return $statistical;
    }
}
