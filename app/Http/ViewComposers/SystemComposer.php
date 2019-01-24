<?php

namespace App\Http\ViewComposers;

use App\Services\SystemService;
use Illuminate\View\View;

class SystemComposer
{
    /**
     * Where to receipt systems from SystemService.
     *
     * @var $systemsService
     */
    protected $systemsService;

    /**
     * Create a new controller instance.
     *
     * @param SystemService $systems SystemService
     *
     * @return void
     */
    public function __construct(SystemService $systems)
    {
        $this->systemsService = $systems;
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
        $view->with('systems', $this->systemsService->getAll());
    }
}
