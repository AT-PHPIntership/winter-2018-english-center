<?php 
namespace App\Services;

use App\Models\Question;
use App\Models\Answer;

class QuestionService
{
    public function destroy($id)
    {
        $question = Question::find($id);
        $question->delete();
    }
}
?>
