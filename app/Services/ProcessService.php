<?php 
namespace App\Services;

use App\Models\Course;
use App\Models\Lesson;
use Auth;

class ProcessService 
{
    public function getCourseLearn()
    {
        return Auth::user()->courses;   
    }

    public function getLessonLearn()
    {
        return Auth::user()->lessons;
    }

    public function process($courseId, $userId)
    {   
        $data = [];
        $total = 0;
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
