<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonController extends Controller
{
    public function show()
    {
        return view('frontend.pages.detail_lesson');
    }
}
