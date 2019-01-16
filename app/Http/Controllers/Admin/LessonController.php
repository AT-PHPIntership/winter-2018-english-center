<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\LessonService;

class LessonController extends Controller
{
    /**
     * Where to receipt users from LessonService.
     *
     * @var $lessonService
     */
    private $lessonService;

    /**
     * Create a new controller instance.
     *
     * @param LessonService $lessonService LessonService
     *
     * @return void
     */
    public function __construct(LessonService $lessonService)
    {
        $this->lessonService = $lessonService;
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
}
