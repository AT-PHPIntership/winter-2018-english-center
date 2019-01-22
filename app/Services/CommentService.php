<?php
namespace App\Services;

use App\Models\Comment;

class CommentService
{
     /**
     * Function index get all comments
     *
     * @return App\Services\CommentService
    **/
    public function index()
    {
        $comments = Comment::with('user')->orderBy('created_at', config('define.courses.order_by_desc'))->paginate(config('define.courses.limit_rows'));
        return $comments;
    }
}
