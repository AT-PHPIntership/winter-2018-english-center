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
        $comments = Comment::where('parent_id', null)->with('user')->orderBy('created_at', config('define.courses.order_by_desc'))->paginate(config('define.courses.limit_rows'));
        return $comments;
    }

    /**
     * Function destroy comment
     *
     * @param Comment $id comment
     *
     * @return App\Services\CommentService
    **/
    public function destroy($id)
    {
        $comment = Comment::find($id);
        if ($comment->parent === null) {
            Comment::where('id', $id)->orWhere('parent_id', $id)->delete();
        } else {
            Comment::where('id', $id)->delete();
        }
    }
}
