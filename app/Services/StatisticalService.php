<?php
namespace App\Services;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;

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
        $maxLessonUser = \DB::table('lessons')
                        ->join('lesson_user', 'lessons.id', '=', 'lesson_user.lesson_id')
                        ->select('lessons.name', \DB::raw('count(*) as total'))
                        ->groupBy('lessons.id')
                        ->orderBy('total', 'desc')
                        ->limit(5)
                        ->get();

        // dd($maxLessonUser);
        $monthCourseUser = \DB::table('courses')
                        ->join('course_user', 'courses.id', '=', 'course_user.course_id')
                        ->select(\DB::raw('month(learn_time) as month'), \DB::raw('count(*) as total_user'))
                        ->groupBy('month')
                        ->get();
        // dd($monthCourseUser);
        $statistical = [
            'totalCourses' => $totalCourses,
            'totalLessons' => $totalLessons,
            'totalUsers' => $totalUsers,
            'maxLessonUser' => $maxLessonUser,
            'monthCourseUser' => $monthCourseUser,
        ];
        return $statistical;
    }
}
