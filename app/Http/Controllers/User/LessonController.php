<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\LessonService;
use App\Models\Lesson;

class LessonController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param Lesson $lesson lesson
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        $recentLessons = app(LessonService::class)->recentLesson();
        return view('frontend.pages.detail_lesson', compact('lesson', 'recentLessons'));
    }
}
