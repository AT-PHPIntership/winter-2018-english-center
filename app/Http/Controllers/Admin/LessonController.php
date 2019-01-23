<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\LessonService;
use App\Services\ImageService;
use App\Http\Requests\LessonRequest;

class LessonController extends Controller
{
    /**
     * Where to receipt users from LessonService.
     *
     * @var $lessonService
     */
    private $lessonService;

    /**
     * Where to receipt users from ImageService.
     *
     * @var $imageService
     */
    private $imageService;

    /**
     * Create a new controller instance.
     *
     * @param LessonService $lessonService LessonService
     * @param ImageService  $imageService  ImageService
     *
     * @return void
     */
    public function __construct(LessonService $lessonService, ImageService $imageService)
    {
        $this->lessonService = $lessonService;
        $this->imageService = $imageService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = $this->lessonService->index();
        return view('backend.lessons.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.lessons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LessonRequest $request Request
     *
     * @return void
     */
    public function store(LessonRequest $request)
    {
        dd($request->ajax);
        $data = $request->except(['_token']);
        $data['image'] = $this->imageService->uploadImageLesson($data['image']);
        $this->lessonService->store($data);
        return redirect()->route('admin.lessons.index')->with('success', __('common.success'));
    }
}
