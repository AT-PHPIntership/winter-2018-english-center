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

    /**
     * Get product from keyword in search field
     *
     *@param request $request [request to get product]
     *
     * @return compare view
     */
    public function getListCourses(Request $request)
    {
        if ($request->ajax()) {
            $response = $this->courseService->ajaxCourseSearch($request->get('query'));
            return response()->json($response);
        } else {
            $query = $request->get('search');
            $search = $this->courseService->courseSearch($query);
            return view('frontend.search', compact('search'));
        }
    }
}
