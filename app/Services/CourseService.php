<?php

namespace App\Services;

use App\Models\Course;
use Event;
use Auth;

class CourseService
{
    /**
     * Function index get all course
     *
     * @return App\Services\CourseService
    **/
    public function index()
    {
        return $courses = Course::with('parent')->latest()->paginate(config('define.courses.limit_rows'));
    }

    /**
     * Function index get all course
     *
     * @return App\Services\CourseService
    **/
    public function getChildren()
    {
        return Course::where('parent_id', '!=', null)->get();
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
     * Function store create course new
     *
     * @param ValidationCourse $request comment
     *
     * @return App\Services\CourseService
    **/
    public function store($request)
    {
        return Course::create($request->only(['name', 'parent_id','content']));
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
     * @param Course $id comment
     *
     * @return App\Services\CourseService
    **/
    public function destroy($id)
    {
        $course = Course::find($id);
        if ($course->parent ===  null) {
            Course::where('id', $id)->orWhere('parent_id', $id)->delete();
        } else {
            Course::where('id', $id)->delete();
        }
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
            ->select('id', 'name', 'parent_id')
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

    /**
     * Function index get recent course
     *
     * @param \Illuminate\Http\Request $id course
     *
     * @return App\Services\LessonService
    **/
    public function countViewCourse($id)
    {
        $course = Course::find($id);
        Event::fire('courses.view', $course);
        return $course;
    }

    /**
     * Function index get recent course
     *
     * @param \Illuminate\Http\Request $course  course
     * @param \Illuminate\Http\Request $lessons lesson
     *
     * @return App\Services\LessonService
    **/
    public function historyLesson($course, $lessons)
    {
        // dd($lessons);
        $lessonBasedCourseId = $lessons->filter(function ($val) use ($course) {
            return $val->course_id == $course->id;
        });
        // dd($lessonBasedCourseId);
        $lessonCompare = $lessonBasedCourseId->pluck('id');
        if(Auth::check()){
            $lessonUser = Auth::user()->lessons->pluck('id');
            $compareDiff = $lessonCompare->diff($lessonUser);
            $results = $lessonBasedCourseId->whereIn('id', $compareDiff);
            // dd($compareDiff != null);
            if (count($compareDiff) == 0) {
                return $lessonBasedCourseId->pluck('order')->max();
            }
            return $results->pluck('order')->min();
        }
    }
}
