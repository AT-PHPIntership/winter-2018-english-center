<?php
namespace App\Services;

use App\Models\Lesson;
use Config\define;

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
     * @return App\Services\LessonService
    **/
    public function recentLesson()
    {
        $recentLessons = Lesson::orderBy('created_at', config('define.order_by_desc'))->take(config('define.recentLessons'))->get();
        return $recentLessons;
    }
}
