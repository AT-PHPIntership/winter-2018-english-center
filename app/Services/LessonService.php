<?php
namespace App\Services;

use App\Models\Lesson;

class LessonService
{
    /**
     * Function index get all lesson
     *
     * @return App\Services\LessonService
    **/
    public function index()
    {
        return Lesson::all();
    }
}
