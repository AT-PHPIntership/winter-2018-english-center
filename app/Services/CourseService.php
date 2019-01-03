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
        // $U = $Course::VIP;

        $courses = Course::select('id', 'title')->where('parent_id', null)->get();
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
        // dd($request->only(['title', 'parent_id', 'flag']));
        return Course::create($request->only(['title', 'parent_id', 'flag']));
    }
}
