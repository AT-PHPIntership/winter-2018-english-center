<?php
namespace App\Services;

use App\Models\Lesson;
use App\Models\Course;
use Config\define;
use DB;
use App\Models\Answer;
use Event;

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
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $data data
     *
     * @return \Illuminate\Http\Response
     */
    public function store($data)
    {
        $lesson = Lesson::create($data);
        $lesson->vocabularies()->attach($data['vocabularies_id']);
        return $lesson;
    }

    /**
     * Edit resource in storage.
     *
     * @param \Illuminate\Http\Request $data data
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($data)
    {
        return $data->load(['vocabularies']);
    }

    /**
    * Handle update user to database
    *
    * @param \Illuminate\Http\Request $data   data
    * @param Lesson                   $lesson lesson
    *
    * @return void
    */
    public function update($data, $lesson)
    {
        $lesson->update($data);
        if (isset($data['vocabulary_id'])) {
            $lesson->vocabularies()->sync($data['vocabulary_id']);
        }
    }

    /**
     * Function destroy lesson
     *
     * @param Lesson $lesson lesson
     *
     * @return App\Services\LessonService
    **/
    public function destroy($lesson)
    {
        $lesson->vocabularies()->detach();
        $lesson->delete();
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
     * @param \Illuminate\Http\Request $answer answer
     * @param \Illuminate\Http\Request $userId user
     *
     * @return App\Services\LessonService
    **/
    public function resutlLesson($answer, $userId)
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
        $result['correct'] = $correct;
        $result['total'] = $answer;
        return $result;
    }

    /**
     * Function index get recent lesson
     *
     * @param \Illuminate\Http\Request $lesson lesson
     *
     * @return App\Services\LessonService
    **/
    public function getPrevNextLesson($lesson)
    {
        $previousLesson = Lesson::where([
            ['course_id', '=', $lesson->course_id],
            ['id', '<', $lesson->id],
        ])->max('id');
        $nextLesson = Lesson::where([
            ['course_id', '=', $lesson->course_id],
            ['id', '>', $lesson->id],
        ])->min('id');
        return [$previousLesson, $nextLesson];
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
