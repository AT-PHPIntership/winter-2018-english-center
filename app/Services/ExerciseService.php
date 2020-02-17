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
     * @param Exercise $exercises   Exercises
     * @param Lesson   $lessonId    Lesson
     * @param Question $questions   Question
     * @param Answer   $totalAnswer Answer
     * @param Answer   $status      Answer
     *
     * @return App\Services\ExerciseService
    **/
    public function store($exercises, $lessonId, $questions, $totalAnswer, $status)
    {
        $data = [];
        $data['lesson_id'] = $lessonId;
        $data['title'] = $exercises;
        for ($i = 0; $i < count($questions); $i++) {
            foreach ($questions as $key => $value) {
                if ($i == $key) {
                    $data['questions'][] = [
                        [
                        'content' => $value,
                        'answers' => $totalAnswer[$i],
                        'status' => $status[$i],
                        ]
                    ][0];
                }
            }
        }
        
        $exercise = Exercise::create($data);
        $this->createQuestionAnswer($data, $exercise);
        return ['success', 'Success!'];
    }


    private function createQuestionAnswer($data, $exercise)
    {
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
        $exercise->questions()->delete();
        $this->createQuestionAnswer($data, $exercise);
    }

    /**
     * Function destroy exercise
     *
     * @param Exercise $exercise exercise
     *
     * @return App\Services\ExerciseService
    **/
    public function destroy($exercise)
    {
        return $exercise->delete();
    }
}
