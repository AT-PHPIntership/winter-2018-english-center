<?php

namespace App\Http\ViewComposers;

use App\Services\RoleService;
use Illuminate\View\View;

class RoleComposer
{
    /**
     * Where to receipt roles from RoleService.
     *
     * @var $userService
     */
    protected $rolesService;

    /**
     * Create a new controller instance.
     *
     * @param RoleService $roles RoleService
     *
     * @return void
     */
    public function __construct(RoleService $roles)
    {
        $this->rolesService = $roles;
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
        $view->with('roles', $this->rolesService->getAll());
    }
}
