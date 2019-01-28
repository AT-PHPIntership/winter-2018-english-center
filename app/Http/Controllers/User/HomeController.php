<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CourseService;
use App\Services\SliderService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param SliderService $sliderService SliderService
     * @param CourseService $courseService CourseService
     *
     * @return void
     */
    public function __construct(SliderService $sliderService, CourseService $courseService)
    {
        $this->sliderService = $sliderService;
        $this->courseService = $courseService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = $this->sliderService->getAll();
        $popularCourses = $this->courseService->getPopularCourses();
        $newCourses = $this->courseService->getNewCourses();
        return view('frontend.home')->with(['sliders' => $sliders, 'popularCourses' => $popularCourses, 'newCourses' => $newCourses]);
    }
}
