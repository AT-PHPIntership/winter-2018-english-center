<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\RateService;
use App\Models\Lesson;
use App\Models\Course;

class RatingController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param Course $course Course
     *
     * @return \Illuminate\Http\Response
     */
    public function showRating(Course $course)
    {
            return view('frontend.lessons.rating', compact('course'));
    }

    /**
     * Get the specified resource.
     *
     * @param Request  $request Request
     * @param Interger $id      course
     *
     * @return \Illuminate\Http\Response
     */
    public function getRating(Request $request, $id)
    {
        app(RateService::class)->ratingStar($request->all(), $id);
        app(RateService::class)->calAvg($id);
        return redirect()->route('user.course.detail', $id);
    }
}
