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
        return Course::create($request->only(['title', 'parent_id', 'flag']));
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
        return Course::findOrFail($id);
    }

    /**
     * Function update course
     *
     * @param ValidationCourse $data   requestCourse
     * @param Course           $course course
     *
     * @return App\Services\CourseService
    **/
    public function update($data, $course)
    {
        return $course->update($data);
    }

    /**
     * Function destroy course
     *
     * @param Course $course comment
     *
     * @return App\Services\CourseService
    **/
    public function destroy($course)
    {
        return $course->delete();
    }

    /**
     * Function get popular courses
     *
     * @return App\Services\CourseService
    **/
    public function getPopularCourses()
    {
        return \DB::table('courses')
                    ->join('course_user', 'course_user.course_id', '=', 'courses.id')
                    ->select('courses.*', \DB::raw('count(*) as total'))
                    ->groupBy('courses.id')
                    ->orderBy('total', 'desc')
                    ->limit(config('define.courses.limit_courses'))
                    ->get();
    }

    /**
     * Function get new courses
     *
     * @return App\Services\CourseService
    **/
    public function getNewCourses()
    {
        return \DB::table('courses')
                    ->select('courses.*')
                    ->orderBy('created_at', 'desc')
                    ->limit(config('define.courses.limit_courses'))
                    ->get();
    }
}
