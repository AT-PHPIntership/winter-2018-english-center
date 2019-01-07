<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CourseService;
use App\Http\Requests\CreateCourseRequest;
use Illuminate\Support\Facades\Lang;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = app(CourseService::class)->index();
        return view('backend.courses.index')->with('courses', $courses);
    }

    /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.courses.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $requestCourse CreateCourseRequest comment
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCourseRequest $requestCourse)
    {
        app(CourseService::class)->store($requestCourse);
        return redirect()->route('admin.courses.index')->with('success', Lang::get('course.create_course.success'));
    }
    
    /**
      * Edit the form for editing the specified resource.
      *
      * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('backend.courses.edit');
    }
}
