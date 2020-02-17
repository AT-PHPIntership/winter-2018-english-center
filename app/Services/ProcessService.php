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
        // foreach ($courses as $key => $courseChild) {
        //     $course[] = \DB::table('schedules')->where([['course_id' , '=', $courseChild], ['user_id', $userId]])->groupBy('course_id')->pluck('course_id')->first();
        // }
        foreach ($courses as $key => $courseId) {
            $data[$key]['key'] = $key + 1;
            $data[$key]['id'] = $courseId;
            $data[$key]['name_course'] = Course::where('id', $courseId)->pluck('name')->first();
            // $data[$key]['start_date'] = \DB::table('schedules')->where('course_id', $courseId)->pluck('created_at')->first();
            $data[$key]['total_lesson'] = \DB::table('schedules')->select(\DB::raw('count(*) as totalLesson'))->where([['course_id', $courseId], ['user_id', $userId]])->groupBy('course_id')->pluck('totalLesson')->first();
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
        $lessons = \DB::table('lessons')->where('course_id', $courseId)->get();
        //get all lesson has id = lessonId
        // foreach ($lessons as $key => $item) {
        //     $lesson[] = Lesson::where('id', $item->lesson_id)->get();
        // }
        foreach ($lessons as $key => $val) {
            $data[$key]['key'] = $key + 1;
            $data[$key]['id'] = $val->id;
            $data[$key]['name_lesson'] =$val->name;
            $data[$key]['percent_learn'] = ( \DB::table('schedules')->where('lesson_id', $val->id)->pluck('score')->first()) / 5 * 100;
        }
        return $data;
    }
}
