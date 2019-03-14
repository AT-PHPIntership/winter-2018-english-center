<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\ImageService;
use App\Http\Requests\UpdateAuthUserRequest;
use App\Http\Requests\UpdateAuthUserPassRequest;
use Auth;

class ProfileController extends Controller
{
    /**
     * Where to receipt users from ImageService.
     *
     * @var $imageService
     */
    private $imageService;

    /**
     * Create a new controller instance.
     *
     * @param ImageService $imageService ImageService
     *
     * @return void
     */
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('frontend.profile.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('frontend.profile.edit');
    }

    /**
     * Show the form for changePass the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changePass()
    {
        return view('frontend.profile.changePass');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuthUserRequest $request)
    {
        // $data = $request->except(['_token','_method']);
        $data = $request->all();
        if ($request->hasFile('url')) {
            $data['url'] = $this->imageService->uploadImage($data['url']);
        }
        Auth::user()->userProfile->update($data);
        Auth::user()->update($data);
        return redirect()->route('user.profiles.show')->with('success', __('common.success'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePass(UpdateAuthUserPassRequest $request)
    {
        $data = $request->except(['_token','_method']);
        Auth::user()->update($data);
        return redirect()->route('user.profiles.show')->with('success', __('common.success'));
    }
}
