<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Services\LessonService;

class LessonComposer
{
    /* @param LessonService $coursesService comment */
    protected $lessonsService;

    /**
     * Create a new profile composer.
     *
     * @param LessonService $lessons lessons
     */
    public function __construct(LessonService $lessons)
    {
        $this->lessonsService = $lessons;
    }

    /**
     * Bind data to the view.
     *
     * @param View $view comment
     *
     * @return Illuminate\View\View
     */
    public function compose(View $view)
    {
        $view->with('lessons', $this->lessonsService->allLesson());
    }
}
