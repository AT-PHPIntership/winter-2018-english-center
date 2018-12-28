<?php

namespace App\Services;

use App\Models\User;
use Config\define;

class UserService
{
    /**
     * Get a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(config('define.page_site'));
        return $users;
    }
}
