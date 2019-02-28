<?php

namespace App\Services;

use App\Models\Rating;
use Auth;
use App\Models\Lesson;
use App\Models\Course;

class RateService
{
    /**
     * Function index get all level
     *
     * @return App\Services\RateService
    **/
    public function getAll()
    {
        return Rating::all();
    }

    /**
     * Store and Update a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $data data
     * @param \Illuminate\Http\Request $ele  ele
     * @param \Illuminate\Http\Request $id   id
     *
     * @return \Illuminate\Http\Response
     */
    public function ratingStar($data, $ele, $id)
    {
        return  Rating::updateOrInsert(
            [
                'user_id'=> Auth::user()->id,
                'ratingable_type' => $ele,
                'ratingable_id' => $id,
            ],
            [
                'star' => $data['rating-star'],
                'content' => $data['review'],
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        );
    }

    /**
     * Calculate average star
     *
     * @param String   $ele lesson course
     * @param Interger $id  lesson course
     *
     * @return null
    **/
    public function calAvg($ele, $id)
    {
        if ($ele == 'lessons') {
            $lesson = Lesson::find($id);
            $count = $lesson->ratings->count();
            $avg = $lesson->ratings->pluck('star')->avg();
            $lesson->update([
                'total_rating' => $count,
                'average' => $avg,
            ]);
            return $lesson;
        }
            $course = Course::find($id);
            $count = $course->ratings->count();
            $avg = $course->ratings->pluck('star')->avg();
            $course->update([
                'total_rating' => $count,
                'average' => $avg,
            ]);
            return $course;
    }
}
