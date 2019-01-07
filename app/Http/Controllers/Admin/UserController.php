<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Where to receipt users from UserService.
     *
     * @var $userService
     */
    private $userService;

    /**
     * Create a new controller instance.
     *
     * @param UserService $userService UserService
     *
     * @return void
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userService->index();
        return view('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request Request
     *
     * @return void
     */
    public function store(UserRequest $request)
    {
        $this->userService->store($request->all());
        return redirect()->route('admin.users.index')->with('success', __('common.success'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param User $user User
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('backend.users.show', compact('user'));
    }
}
