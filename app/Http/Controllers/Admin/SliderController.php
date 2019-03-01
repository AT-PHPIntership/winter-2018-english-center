<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ImageService;
use App\Services\SliderService;
use App\Models\Slider;
use App\Http\Requests\SliderRequest;

class SliderController extends Controller
{
    /**
     * Where to receipt slider from SliderService.
     *
     * @var $sliderService
     */
    private $sliderService;

    /**
     * Where to receipt system from ImageService.
     *
     * @var $imageService
     */
    private $imageService;

    /**
     * Create a new controller instance.
     *
     * @param SliderService $sliderService SliderService
     * @param ImageService  $imageService  ImageService
     *
     * @return void
     */
    public function __construct(SliderService $sliderService, ImageService $imageService)
    {
        $this->sliderService = $sliderService;
        $this->imageService = $imageService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = $this->sliderService->getAll();
        return view('backend.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SliderRequest $request Request
     *
     * @return void
     */
    public function store(SliderRequest $request)
    {
        $data = $request->except(['_token','_method']);
        if ($request->hasFile('image')) {
            $data['image'] = $this->imageService->uploadImageSlider($data['image']);
        }
        $this->sliderService->store($data);
        return redirect()->route('admin.sliders.index')->with('success', __('common.success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Slider $slider slider
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('backend.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     * @param Slider                   $slider  slider
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $data = $request->except(['_token','_method']);
        if ($request->hasFile('image')) {
            $data['image'] = $this->imageService->uploadImageSlider($data['image']);
        }
        $this->sliderService->update($data, $slider);
        return redirect()->route('admin.sliders.index')->with('success', __('common.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Slider $slider slider
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $this->sliderService->destroy($slider);
        return redirect()->route('admin.sliders.index')->with('success', __('common.success'));
    }
}
