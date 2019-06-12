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
    public function show(Exercise $exercise)
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
    public function store(Request $request)
    {
        $response = app(ExerciseService::class)->store($request->get('exercises'), $request->get('lessonId'), $request->get('questions'), $request->get('totalAnswer'), $request->get('status'));
        return response()->json($response);
    }

    /**
      * Edit the form for editing the specified resource.
      *
      * @param Exercise $exercise exercise
      *
      * @return \Illuminate\Http\Response
     */
    public function edit(Exercise $exercise)
    {
        return view('backend.exercises.edit')->with('exercise', $exercise);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\CreateExerciseRequest $request  requestCourse
     * @param Exercise                               $exercise exercise
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CreateExerciseRequest $request, Exercise $exercise)
    {
        app(ExerciseService::class)->update($request->all(), $exercise);
        return redirect()->route('admin.exercises.index')->with('success', __('common.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Exercise $exercise exercise
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exercise $exercise)
    {
        app(ExerciseService::class)->destroy($exercise);
        return redirect()->route('admin.exercises.index')->with('success', __('common.success'));
    }

    /**
     * Get List Vocabularies
     *
     * @param Request $request Request
     *
     * @return \Illuminate\Http\Response
     */
    public function getListExercises(Request $request)
    {
        if ($request->ajax()) {
            $exercises = Exercise::select(['id', 'title as text'])->where('title', 'LIKE', '%' . $request["term"] . '%')->paginate(config('define.page_site_exercise'));
            $results = [
                "results" => $exercises->items(),
                "pagination" => [
                    "more" => $exercises->hasMorePages()
                ]
            ];
            return response()->json($results);
        }
    }
}
