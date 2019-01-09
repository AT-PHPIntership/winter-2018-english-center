<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserProfile;
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
        $users = User::with('userProfile')->paginate(config('define.page_site'));
        return $users;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $data data
     *
     * @return \Illuminate\Http\Response
     */
    public function store($data)
    {
        $user = User::create($data);
        $user->userProfile()->create($data);
    }

    /**
    * Handle update user to database
    *
    * @param \Illuminate\Http\Request $data data
    * @param User                     $user user
    *
    * @return void
    */
    public function update($data, $user)
    {
        $user->update($data);
        $user->userProfile->update($data);
    }
}
