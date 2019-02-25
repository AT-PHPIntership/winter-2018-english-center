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
     * @param String   $ele lesson course
     * @param Interger $id  lesson course
     *
     * @return \Illuminate\Http\Response
     */
    public function showRating($ele, $id)
    {
        if ($ele == 'lessons') {
            $common = Lesson::find($id);
            return view('frontend.lessons.rating', compact(['common', 'ele']));
        }
            $common = Course::find($id);
            return view('frontend.lessons.rating', compact(['common', 'ele']));
    }

    /**
     * Get the specified resource.
     *
     * @param Request  $request Request
     * @param String   $ele     lesson course
     * @param Interger $id      lesson course
     *
     * @return \Illuminate\Http\Response
     */
    public function getRating(Request $request, $ele, $id)
    {
        app(RateService::class)->ratingStar($request->all(), $ele, $id);
        app(RateService::class)->calAvg($ele, $id);
        if ($ele == 'lessons') {
            return redirect()->route('user.lesson.detail', $id);
        }
            return redirect()->route('user.course.detail', $id);
    }
}
