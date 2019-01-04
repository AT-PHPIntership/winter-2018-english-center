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
        $users = User::paginate(config('define.page_site'));
        return $users;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {
        $user = [
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'role_id' => $request->role
        ];
        $user = User::create($user);
        $profile = [
            'name' => $request->name,
            'age' => $request->age,
            'url' => $request->url,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'user_id' => $user->id,
        ];
        UserProfile::create($profile);
    }
}
