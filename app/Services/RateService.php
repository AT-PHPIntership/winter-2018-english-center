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
     * @param \Illuminate\Http\Request $id id
     *
     * @return App\Services\RateService
    **/
    public function getAll($id)
    {
        return Rating::where('course_id', $id)->latest()->paginate(3);
    }
    /**
     * Store and Update a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $data data
     * @param \Illuminate\Http\Request $id   id
     *
     * @return \Illuminate\Http\Response
     */
    public function ratingStar($data, $id)
    {
        return  Rating::updateOrInsert(
            [
                'user_id'=> Auth::user()->id,
                'course_id' => $id,
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
     * @param Interger $id course
     *
     * @return null
    **/
    public function calAvg($id)
    {
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
