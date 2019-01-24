<?php
namespace App\Services;

use App\Models\Exercise;
use App\Models\Question;
use App\Models\Answer;
use Carbon\Carbon;

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
            collect($value['answers'])->map(function ($v, $k) use ($question, $value, &$answers) {
                $answers[$question->id.$k]['answers'] = $v;
                $answers[$question->id.$k]['status'] = $k == $value['status'];
                $answers[$question->id.$k]['question_id'] = $question->id;
            });
        }
        Answer::insert($answers);
    }

    /**
     * Function update exercise
     *
     * @param ValidationExercise $data     requestExercise
     * @param Exercise           $exercise exercise
     *
     * @return App\Services\ExerciseService
    **/
    public function update($data, $exercise)
    {
        $exercise->update($data);
        foreach ($data['questions'] as $question) {
            $questionId = Question::find($question['id']);
            $questionId->update(array_except($question, ['answers', 'status']));
            $questionId->answers()->delete();
            collect($question['answers'])->map(function ($v, $k) use ($question, &$answers) {
                $answers[$question['id'].$k]['answers'] = $v;
                $answers[$question['id'].$k]['status'] = $k == $question['status'];
                $answers[$question['id'].$k]['question_id'] = $question['id'];
            });
        }
        Answer::insert($answers);
    }
}
