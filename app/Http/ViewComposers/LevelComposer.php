<?php

namespace App\Http\ViewComposers;

use App\Services\LevelService;
use Illuminate\View\View;

class LevelComposer
{
    /**
     * Where to receipt roles from RoleService.
     *
     * @var $userService
     */
    protected $levelsService;

    /**
     * Create a new controller instance.
     *
     * @param LevelService $levels LevelService
     *
     * @return void
     */
    public function __construct(LevelService $levels)
    {
        $this->levelsService = $levels;
    }

    /**
     * Bind data to the view.
     *
     * @param View $view View
     *
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('levels', $this->levelsService->index());
    }
}
