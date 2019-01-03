<?php

namespace App\Services;

use App\Models\Role;
use Config\define;

class RoleService
{
    /**
     * Get a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        $roles = Role::all();
        return $roles;
    }
}
