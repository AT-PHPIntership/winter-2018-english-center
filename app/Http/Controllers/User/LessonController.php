<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\LessonService;
use App\Request\UserAnswerRequest;
use App\Models\Lesson;
use App\Services\CommentService;

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
        $lesson = app(LessonService::class)->getPrevNextLesson($lesson);
        return view('frontend.pages.detail_lesson', compact('lessons', 'recentLessons', 'lesson', 'countView'));
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

    /**
     * Add comment to lesson d resource.
     *
     * @param Request $request lesson
     *
     * @return \Illuminate\Http\Response
     */
    public function lessonComment(Request $request)
    {
        $response = app(CommentService::class)->comment($request->get('userId'), $request->get('lessonId'), $request->get('content'));
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request lesson
     *
     * @return \Illuminate\Http\Response
     */
    public function lessonReply(Request $request)
    {
        $response = app(CommentService::class)->reply($request->get('userId'), $request->get('lessonId'), $request->get('content'), $request->get('parentComment'));
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param Lesson $lesson lesson
     *
     * @return \Illuminate\Http\Response
     */
    public function showRating(Lesson $lesson)
    {
        return view('frontend.lessons.rating', compact('lesson'));
    }

    /**
     * Get the specified resource.
     *
     * @param Request $request Request
     * @param Lesson  $lesson  lesson
     *
     * @return \Illuminate\Http\Response
     */
    public function getRating(Request $request, Lesson $lesson)
    {
        $rate = app(LessonService::class)->ratingStar($request->all(), $lesson);
        return redirect()->route('user.lesson.detail', $lesson->id);
    }
}
