<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ExerciseService;
use App\Http\Requests\CreateExerciseRequest;
use App\Models\Exercise;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercises = app(ExerciseService::class)->index();
        return view('backend.exercises.index')->with('exercises', $exercises);
    }

    /**
      * Show the form for creating a new resource.
      *
      * @param Exercise $exercise exercise
      *
      * @return \Illuminate\Http\Response
     */
    public function show($exercise)
    {
        $exercises = app(ExerciseService::class)->show($exercise);
        return view('backend.exercises.show')->with('exercises', $exercises);
    }

    /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.exercises.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request CreateExerciseRequest comment
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateExerciseRequest $request)
    {
        app(ExerciseService::class)->store($request->all());
        return redirect()->route('admin.exercises.index')->with('success', __('common.success'));
    }
}
