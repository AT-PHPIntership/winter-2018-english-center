<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CourseService;
use App\Services\ImageService;
use App\Http\Requests\CreateCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
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
     * @param \Illuminate\Http\Request $requestCourse CreateCourseRequest comment
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCourseRequest $requestCourse)
    {
        $data =  $requestCourse->all();
        $data['image'] = app(ImageService::class)->uploadImageCourse($data['image']);
        app(CourseService::class)->store($data);
        return redirect()->route('admin.courses.index')->with('success', __('common.success'));
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
     * @param \Illuminate\Http\CreateCourseRequest $requestCourse requestCourse
     * @param Course                               $course        course
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $requestCourse, Course $course)
    {
        $data = $requestCourse->all();
        if ($requestCourse->hasFile('image')) {
            $data['image'] = app(ImageService::class)->uploadImageCourse($data['image']);
        }
        app(CourseService::class)->update($data, $course);
        return redirect()->route('admin.courses.index')->with('success', __('common.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Course $id comment
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        app(CourseService::class)->destroy($id);
        return redirect()->route('admin.courses.index')->with('success', __('common.success'));
    }
}
