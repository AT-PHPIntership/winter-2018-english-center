<?php

namespace App\Observers;

use App\Models\Question;

class QuestionObserver
{
    /**
     * Handle the user "deleting" event.
     *
     * @param \App\User $user User
     *
     * @return void
     */
    public function deleting(Question $question)
    {
        $question->answers()->delete();
    }
}
