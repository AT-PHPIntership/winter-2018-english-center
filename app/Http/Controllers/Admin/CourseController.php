<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CourseService;
use App\Http\Requests\ValidationCourse;
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
     * @param \Illuminate\Http\Request $requestCourse ValidationCourse comment
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ValidationCourse $requestCourse)
    {
        app(CourseService::class)->store($requestCourse);
        return redirect()->route('admin.courses.index')->with('success', 'New Course added successfully.');
    }
    /**
      * Edit the form for editing the specified resource.
      *
      * @param Course $id comment
      *
      * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = app(CourseService::class)->edit($id);
        return view('backend.courses.edit')->with('course', $course);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\ValidationCourse $requestCourse comment
     * @param Course                            $course        comment
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ValidationCourse $requestCourse, Course $course)
    {
        app(CourseService::class)->update($requestCourse, $course);
        return redirect()->route('admin.courses.index')->with('success', 'Update Course successfully.');
    }
}
