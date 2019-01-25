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
                        ->join('users', 'users.id', '=', 'lesson_user.user_id')
                        ->select('lessons.name', \DB::raw('count(*) as total'))
                        ->groupBy('lessons.id')
                        ->orderBy('total', 'desc')
                        ->limit(5)
                        ->get();
        $statistical = [
            'totalCourses' => $totalCourses,
            'totalLessons' => $totalLessons,
            'totalUsers' => $totalUsers,
            'maxLessonUser' => $maxLessonUser,
        ];
        return $statistical;
    }
}
