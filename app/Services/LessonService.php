<?php
namespace App\Services;

use App\Models\Lesson;
use App\Models\Course;
use Config\define;
use DB;
use App\Models\Answer;
use Event;
use JavaScript;

class LessonService
{
    /**
     * Function index get all lesson
     *
     * @return App\Services\LessonService
    **/
    public function index()
    {
        $lessons = Lesson::with(['course', 'level'])->orderBy('created_at', config('define.order_by_desc'))->paginate(config('define.page_site'));
        return $lessons;
    }

    /**
     * Show resource in storage.
     *
     * @param \Illuminate\Http\Request $lesson lesson
     *
     * @return \Illuminate\Http\Response
     */
    public function show($lesson)
    {
        return $lesson->load(['vocabularies', 'exercises', 'exercises.questions', 'exercises.questions.answers']);
    }

    /**
     * Function index get recent lesson
     *
     * @param \Illuminate\Http\Request $lesson lesson
     *
     * @return App\Services\LessonService
    **/
    public function getLesson($lesson)
    {
        $previousLesson = Lesson::where([
            ['course_id', '=', $lesson->course_id],
            ['id', '<', $lesson->id],
        ])->max('id');
        $nextLesson = Lesson::where([
            ['course_id', '=', $lesson->course_id],
            ['id', '>', $lesson->id],
        ])->min('id');
        JavaScript::put([
            'navigate' => [
                'previous' => $previousLesson,
                'next' => $nextLesson,
            ]
        ]);
         return $lesson->load('exercises.questions');
    }

    /**
     * Function index get recent lesson
     *
     * @return App\Services\LessonService
    **/
    public function recentLesson()
    {
        return Lesson::orderBy('created_at', config('define.order_by_desc'))->limit(config('define.recent_lessons'))->get();
    }

    /**
     * Function index get recent lesson
     *
     * @param \Illuminate\Http\Request $answer   answer
     * @param \Illuminate\Http\Request $userId   user
     * @param \Illuminate\Http\Request $lessonId lesson
     *
     * @return App\Services\LessonService
    **/
    public function resutlLesson($answer, $userId, $lessonId)
    {
        $result = [];
        foreach ($answer as $value) {
            DB::table('user_answers')->insert([
                'user_id' => $userId,
                'answer_id'=> $value
            ]);
            $val = Answer::where('id', $value)->first()["status"];
            if ($val == 1) {
                $correct[] = $value;
            }
        }
        $goalableLesson = Lesson::find(intval($lessonId))->goals->pluck('goal_id')->first();
        $goalLesson = \DB::table('goals')->select('goal')->where('id', $goalableLesson)->first()->goal;
        $lesson = Lesson::with('course')->where('id', intval($lessonId))->get();
        $totalLesson = $lesson->pluck('course')->pluck('id')->first();
        $result['correct'] = $correct;
        $result['total'] = $answer;
        $result['goal'] = $goalLesson;
        $result['courseId'] = $totalLesson + 1;
        return $result;
    }

    /**
     * Function index get recent lesson
     *
     * @param \Illuminate\Http\Request $id lesson
     *
     * @return App\Services\LessonService
    **/
    public function countViewLesson($id)
    {
        $lesson = Lesson::find($id);
        Event::fire('lessons.view', $lesson);
        return $lesson;
    }
}
