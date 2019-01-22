<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CommentService;

class CommentController extends Controller
{
    public function index()
    {
        $comments = app(CommentService::class)->index();
        // dd($comments);
        return view('backend.comments.index')->with('comments', $comments);
    }
}
