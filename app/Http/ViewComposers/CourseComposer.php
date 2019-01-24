<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Services\CourseService;

class CourseComposer
{
    /* @param CourseService $coursesService comment */
    protected $coursesService;

    /**
     * Create a new profile composer.
     *
     * @param CourseService $courses comment
     */
    public function __construct(CourseService $courses)
    {
        $this->coursesService = $courses;
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
        $view->with(['courses' => $this->coursesService->getCourse(), 'homeCourses' => $this->coursesService->get()]);
    }
}
