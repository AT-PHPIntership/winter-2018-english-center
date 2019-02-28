<?php
namespace App\Services;

use App\Models\Question;
use App\Models\Answer;

class QuestionService
{
    /**
     * Display the specified resource.
     *
     * @param Question $id Question
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id);
        $question->delete();
    }
}
