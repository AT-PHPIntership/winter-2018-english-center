<?php

namespace App\Services;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Event;
use Auth;
use DB;

class CourseService
{
    /**
     * Function index get all course
     *
     * @return App\Services\CourseService
    **/
    public function index()
    {
        return Course::with('parent')->latest()->paginate(config('define.courses.limit_rows'));
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
                    ->orderBy('created_at', 'desc')
                    ->limit(config('define.courses.limit_courses'))
                    ->get();
    }

    /**
     * Function get new courses
     *
     * @return App\Services\CourseService
    **/
    public function getHighestRatingCourses()
    {
        return \DB::table('courses')
                    ->select('courses.*')
                    ->where('parent_id', '!=', 'NULL')
                    ->orderBy('average', 'desc')
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
        //All lessons in course collection
        $lessonBasedCourseId = $lessons->filter(function ($val) use ($course) {
            return $val->course_id == $course->id;
        });
        //id of each lesson
        $lessonId = $lessonBasedCourseId->pluck('id');
        if (Auth::check()) {
            //lessons => user learned
            $lessonUser = Auth::user()->lessons->pluck('id');
            //$compareDiff lessons => user no yet learned
            $compareDiff = $lessonId->diff($lessonUser);
            $results = $lessonBasedCourseId->whereIn('id', $compareDiff);
            if (count($compareDiff) == 0) {
                return $lessonBasedCourseId->pluck('order')->max();
            }
            return $results->pluck('order')->min();
        }
    }

    /**
     * Function check account of user
     *
     * @param \Illuminate\Http\Request $userId   user
     * @param \Illuminate\Http\Request $lessonId lesson

     * @return App\Services\LessonService
    **/
    public function checkAccount($userId, $lessonId)
    {
        $result = [];
        //total course learned
        $totalCourse = DB::table('course_user')->where('user_id', $userId)->select(DB::raw('count(*) as totalCourse'))->groupBy('course_user.user_id')->pluck('totalCourse')->first();
        //score course learned
        $score = optional(DB::table('schedules')->where('user_id', $userId)->select(DB::raw('sum(score) as score'))->groupBy('schedules.user_id')->first())->score;
        //compare currentCourse with learnedCourse
        // dd($score);
        $currentCourse = Lesson::find($lessonId)->course->id;
        $learnedCourse = DB::table('course_user')->where('user_id', $userId)->select('course_user.*')->pluck('course_id');
        $role = Auth::user()->role->name;
        // dd($role);
        $result['totalCourse'] = $totalCourse;
        $result['score'] = $score;
        $result['currentCourse'] = $currentCourse;
        $result['learnedCourse'] = $learnedCourse;
        $result['role'] = $role;
        return $result;
    }
}
