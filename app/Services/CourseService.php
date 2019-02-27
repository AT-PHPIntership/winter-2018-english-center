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
        return Course::where('parent_id', null)->get();
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
                    ->where('parent_id', '!=', 'NULL')
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
                    ->where('parent_id', '!=', 'NULL')
                    ->orderBy('updated_at', 'desc')
                    ->limit(config('define.courses.limit_courses'))
                    ->get();
    }

    /**
     * Get courses based on query
     *
     * @param object $query [query get product]
     *
     * @return collection
     */
    public function ajaxCourseSearch($query)
    {
        return \DB::table('courses')
            ->select('id', 'name')
            ->where('name', 'LIKE', "%{$query}%")
            ->limit(config('define.courses.page_site_course'))
            ->get();
    }

    /**
     * Get courses based on query
     *
     * @param object $query [query get product]
     *
     * @return collection
     */
    public function courseSearch($query)
    {
        return Course::where('name', 'LIKE', "%{$query}%")->paginate(config('define.courses.page_site_course'))->appends(['search'=> $query]);
    }
}
