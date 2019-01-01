<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CourseService;
use App\Http\Requests\ValidationCourse;
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
        $courses = Course::where('parent_id', '=', null)->get();
        return view('backend.courses.create', compact('courses'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $requestCourse ValidationCourse comment
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ValidationCourse $requestCourse)
    {
        $courses = new Course;
        $courses->title =  $requestCourse->title;
        $courses->parent_id = empty($requestCourse->parent_id) ? null : $requestCourse->parent_id;
        $courses->flag =  $requestCourse->flag;
        $courses->save();
        return redirect()->route('admin.courses.index')->with('success', 'New Course added successfully.');
    }
}
