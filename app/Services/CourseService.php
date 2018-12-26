<?php

namespace App\Services;

use App\Models\Course;

class CourseService
{
    protected $course;
    /**
     * Function index get all course
     *
     * @return App\Services\CourseService
    **/
    public function index()
    {
        $course = Course::all();
        return $course;
    }
}
