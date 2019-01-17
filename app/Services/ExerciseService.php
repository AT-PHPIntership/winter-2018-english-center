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

    /**
     * Function store insert exercise question
     *
     * @param Validation $data get all()
     *
     * @return App\Services\ExerciseService
    **/
    public function store($data)
    {
        $exercise = Exercise::create($data);
        foreach ($data['questions'] as $value) {
            $question = $exercise->questions()->create($value);
            $question->answers()->createMany($value['answers']);
        }
    }

    public function update($data, $exercise)
    {
        $exercise = $exercise->update($data);
    }
}
