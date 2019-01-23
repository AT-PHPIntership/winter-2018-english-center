<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\LessonService;
use App\Services\ImageService;
use App\Http\Requests\LessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Models\Lesson;

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param Lesson $lesson Lesson
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        $lesson = app(LessonService::class)->edit($lesson);
        return view('backend.lessons.edit', compact('lesson'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     * @param Lesson                   $lesson  lesson
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        $data = $request->except(['_token','_method']);
        if ($request->hasFile('image')) {
            $data['image'] = $this->imageService->uploadImageLesson($data['image']);
        }
        $this->lessonService->update($data, $lesson);
        return redirect()->route('admin.lessons.index')->with('success', __('common.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param Lesson $lesson Lesson
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        $lesson = $this->lessonService->show($lesson);
        return view('backend.lessons.show', compact('lesson'));
    }
}
