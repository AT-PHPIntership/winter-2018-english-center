<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ExerciseService;

class ExerciseController extends Controller
{
    public function index()
    {
        $exercises =  app(ExerciseService::class)->index();
        return view('backend.exercises.index')->with('exercises', $exercises);
    }
}
