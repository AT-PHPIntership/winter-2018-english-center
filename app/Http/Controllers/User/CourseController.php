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
     * Display a listing of the resource.
     *
     * @param Course $course course
     *
     * @return \Illuminate\Http\Response
     */
    public function showCourses(Course $course)
    {
        return view('frontend.pages.detail_courses', compact('course'));
    }

    /**
     * Display the specified resource.
     *
     * @param Course $course course
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $lessons = app(LessonService::class)->index();
        $countView = app(CourseService::class)->countViewCourse($course->id);
        $orderLearn = app(CourseService::class)->historyLesson($course, $lessons);
        return view('frontend.pages.detail_course', compact('course', 'lessons', 'countView', 'orderLearn'));
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request course lesson
     * @param Request $element course lesson
     *
     * @return \Illuminate\Http\Response
     */
    public function elementComment(Request $request, $element)
    {
        // dd($element);
        $response = app(CommentService::class)->comment($request->get('userId'), $request->get('elementId'), $request->get('content'), $element);
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request course lesson
     * @param Request $element course lesson
     *
     * @return \Illuminate\Http\Response
     */
    public function elementReply(Request $request, $element)
    {
        $response = app(CommentService::class)->reply($request->get('userId'), $request->get('elementId'), $request->get('content'), $request->get('parentComment'), $element);
        return response()->json($response);
    }
}
