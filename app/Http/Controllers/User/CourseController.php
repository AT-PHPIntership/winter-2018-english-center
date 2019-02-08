<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CourseService;
use App\Services\LessonService;
use App\Services\CommentService;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = app(CourseService::class)->getCourse();
        return view('frontend.pages.course')->with('courses', $courses);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $lessons = app(LessonService::class)->getLesson();
        $comments = app(CommentService::class)->index();
        return view('frontend.pages.detail_course', compact('course', 'lessons', 'comments'));
    }
}
