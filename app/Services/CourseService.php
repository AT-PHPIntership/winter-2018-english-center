<?php

namespace App\Services;

use App\Models\Course;

class CourseService
{
    /**
     * Function index get all course
     *
     * @return App\Services\CourseService
    **/
    public function index()
    {
        $course = Course::orderBy('created_at', config('define.courses.order_by_desc'))->paginate(config('define.courses.limit_rows'));
        return $course;
    }
    /**
     * Function getCourse get all course
     *
     * @return App\Services\CourseService
    **/
    public function getCourse()
    {
        $courses = Course::where('parent_id', null)->get();
        return $courses;
    }
    /**
     * Function store insert course
     *
     * @param ValidationCourse $request comment
     *
     * @return App\Services\CourseService
    **/
    public function store($request)
    {
        return Course::create($request->all());
    }
    /**
     * Function edit course
     *
     * @param Course $id comment
     *
     * @return App\Services\CourseService
    **/
    public function edit($id)
    {
        $course = Course::find($id);
        return $course;
    }
    /**
     * Function update course
     *
     * @param ValidationCourse $request comment
     * @param ValidationCourse $course  comment
     *
     * @return App\Services\CourseService
    **/
    public function update($request, $course)
    {
        return $course->update($request->all());
    }
}
