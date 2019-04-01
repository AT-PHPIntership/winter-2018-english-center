<?php
namespace App\Services;

use App\Models\Course;
use App\Models\Lesson;
use Auth;

class ProcessService
{
    /**
     * Function index get all course parent
     *
     * @return App\Services\CourseService
    **/
    public function getCourseLearn()
    {
        return Course::where('parent_id', null)->get();
    }

    /**
     * Function check account of user
     *
     * @param \Illuminate\Http\Request $courseParentId course parent
     * @param \Illuminate\Http\Request $userId         user
     *
     * @return App\Services\LessonService
    **/
    public function process($courseParentId, $userId)
    {
        $data = [];
        $courses = Course::with('children')->where('parent_id', $courseParentId)->pluck('id');
        foreach ($courses as $key => $courseChild) {
            $course[] = \DB::table('schedules')->where([['course_id' , '=', $courseChild], ['user_id', $userId]])->groupBy('course_id')->pluck('course_id')->first();
        }
        foreach ($course as $key => $courseId) {
            $data[$key]['key'] = $key + 1;
            $data[$key]['id'] = $courseId;
            $data[$key]['name_course'] = Course::where('id', $courseId)->pluck('name')->first();
            $data[$key]['start_date'] = \DB::table('schedules')->where('course_id', $courseId)->pluck('created_at')->first();
            $data[$key]['total_lesson'] = \DB::table('schedules')->select(\DB::raw('count(*) as totalLesson'))->where('course_id', $courseId)->groupBy('course_id')->pluck('totalLesson')->first();
        }
        return $data;
    }

    /**
     * Function check account of user
     *
     * @param \Illuminate\Http\Request $courseId course
     * @param \Illuminate\Http\Request $userId   user
     *
     * @return App\Services\LessonService
    **/
    public function processDetail($courseId, $userId)
    {
        $data = [];

        $lessons = \DB::table('schedules')->where([['course_id', $courseId], ['user_id', $userId]])->get();
        //get all lesson has id = lessonId
        foreach ($lessons as $key => $item) {
            $lesson[] = Lesson::where('id', $item->lesson_id)->get();
        }

        foreach ($lesson as $key => $val) {
            $data[$key]['key'] = $key + 1;
            $data[$key]['id'] = $val->pluck('id')->first();
            $data[$key]['name_lesson'] = $val->pluck('name')->first();
            foreach ($lessons as $val) {
                $data[$key]['date_start'] = $val->created_at;
                $data[$key]['percent_learn'] = ($val->score) / 5 * 100;
            }
        }
        return $data;
    }
}
