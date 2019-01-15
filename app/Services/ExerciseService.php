<?php
namespace App\Services;

use App\Models\Exercise;

class ExerciseService
{
    /**
     * Function index get all exercise
     *
     * @return App\Services\ExerciseService
    **/
    public function index()
    {
        $exercise = Exercise::with('lesson')->orderBy('created_at', config('define.courses.order_by_desc'))->paginate(config('define.courses.limit_rows'));
        return $exercise;
    }

    /**
     * Function show details exercise
     *
     * @param App\Models\Exercise $exercise exercise
     *
     * @return App\Services\ExerciseService
    **/
    public function show($exercise)
    {
        $exercise = Exercise::where('id', $exercise->id)->with(['questions', 'questions.answers'])->orderBy('created_at', config('define.courses.order_by_desc'))->paginate(config('define.courses.limit_rows'));
        return $exercise;
    }
}
