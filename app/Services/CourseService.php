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
     * Function index get all course
     *
     * @return App\Services\CourseService
    **/
    public function create()
    {
        $course = Course::where('parent_id', '=', null)->get();
        return $course;
    }
}
