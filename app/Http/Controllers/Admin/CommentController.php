<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CommentService;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = app(CommentService::class)->index();
        return view('backend.comments.index')->with('comments', $comments);
    }

    /**
      * Show the form for creating a new resource.
      *
      * @param Comment $comment comment
      *
      * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return view('backend.comments.show')->with('comment', $comment);
    }
}
