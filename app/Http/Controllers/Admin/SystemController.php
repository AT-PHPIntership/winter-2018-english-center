<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SystemService;
use App\Models\System;
use App\Http\Requests\UpdateSystemRequest;

class SystemController extends Controller
{
    /**
     * Where to receipt users from UserService.
     *
     * @var $systemService
     */
    private $systemService;

    /**
     * Create a new controller instance.
     *
     * @param SytemService $systemService SystemService
     *
     * @return void
     */
    public function __construct(SystemService $systemService)
    {
        $this->systemService = $systemService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $system = $this->systemService->get();
        return view('backend.systems.index', compact('system'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param System $system system
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(System $system)
    {
        return view('backend.systems.edit', compact('system'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     * @param System                   $system  system
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSystemRequest $request, System $system)
    {
        $data = $request->except(['_token','_method']);
        $this->systemService->update($data, $system);
        return redirect()->route('admin.systems.index')->with('success', __('common.success'));
    }
}
