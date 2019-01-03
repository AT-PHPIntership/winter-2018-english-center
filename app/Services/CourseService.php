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
        $courses = Course::with('parent')->orderBy('created_at', config('define.courses.order_by_desc'))->paginate(config('define.courses.limit_rows'));
        return $courses;
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
}
