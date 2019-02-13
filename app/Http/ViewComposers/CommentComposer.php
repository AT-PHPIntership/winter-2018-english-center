<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Services\CommentService;

class CommentComposer
{
    /* @param CommentService $commentsService comment */
    protected $commentsService;

    /**
     * Create a new profile composer.
     *
     * @param CommentService $comments comment
     */
    public function __construct(CommentService $comments)
    {
        $this->commentsService = $comments;
    }

    /**
     * Bind data to the view.
     *
     * @param View $view comment
     *
     * @return Illuminate\View\View
     */
    public function compose(View $view)
    {
        $view->with(['comments' => $this->commentsService->index()]);
    }
}
