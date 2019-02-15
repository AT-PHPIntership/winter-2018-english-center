<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\LessonService;
use App\Request\UserAnswerRequest;
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
        $lessons = app(LessonService::class)->getLesson($lesson);
        $recentLessons = app(LessonService::class)->recentLesson();
        return view('frontend.pages.detail_lesson', compact('lessons', 'recentLessons'));
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request lesson
     *
     * @return \Illuminate\Http\Response
     */
    public function resutlLesson(Request $request)
    {
        $response = app(LessonService::class)->resutlLesson($request->get('answers'), $request->get('userId'));
        return response()->json($response);
    }
}