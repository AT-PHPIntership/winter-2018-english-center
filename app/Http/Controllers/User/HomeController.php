<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CourseService;
use App\Services\SliderService;
use App\Services\RateService;
use App\Models\Level;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param SliderService $sliderService SliderService
     * @param CourseService $courseService CourseService
     * @param RateService   $rateService   RateService
     *
     * @return void
     */
    public function __construct(SliderService $sliderService, CourseService $courseService, RateService $rateService)
    {
        $this->sliderService = $sliderService;
        $this->courseService = $courseService;
        $this->rateService   = $rateService;
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
        $highestRatingCourses = $this->courseService->getHighestRatingCourses();
        return view('frontend.home')->with(['sliders' => $sliders, 'popularCourses' => $popularCourses, 'newCourses' => $newCourses, 'highestRatingCourses' =>$highestRatingCourses]);
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

    /**
     * Display the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAboutUs()
    {
        return view('frontend.about');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listLevel()
    {
        return view('frontend.levels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Level $level Level
     *
     * @return \Illuminate\Http\Response
     */
    public function showLevel(Level $level)
    {
        return view('frontend.levels.show', compact('level'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showContact()
    {
        return view('frontend.contact');
    }
}
