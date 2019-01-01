<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Services\CourseService;

class CourseComposer
{
    protected $courses;

    /**
     * Create a new profile composer.
     *
     * @param CourseService $courses comment
     */
    public function __construct(CourseService $courses)
    {
        $this->courses = $courses;
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
        $view->with('courses', $this->courses->getCourse());
    }
}
