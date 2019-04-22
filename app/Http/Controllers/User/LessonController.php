<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\LessonService;
use App\Request\UserAnswerRequest;
use App\Services\CommentService;
use App\Models\Lesson;
use App\Models\Course;

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
        $countView = app(LessonService::class)->countViewLesson($lesson->id);
        return view('frontend.pages.detail_lesson', compact('lessons', 'recentLessons', 'countView'));
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
        $response = app(LessonService::class)->resutlLesson($request->get('answers'), $request->get('userId'), $request->get('lessonId'), $request->get('courseId'));
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function subscribeMember()
    {
        return view('frontend.pages.subscribe');
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request lesson
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteComment(Request $request)
    {
        $response = app(CommentService::class)->deleteComment($request->get('userId'), $request->get('commentId'));
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request lesson
     *
     * @return \Illuminate\Http\Response
     */
    public function upgradeVip(Request $request)
    {
        app(LessonService::class)->upgradeVip($request->all());
        return redirect()->route('user.home');
    }
}
