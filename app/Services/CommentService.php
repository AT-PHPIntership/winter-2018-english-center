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
     * Function handle comment to lesson
     *
     * @param LessonController $userId    user
     * @param LessonController $elementId lessonid courseId
     * @param LessonController $content   content lesson
     * @param LessonController $element   lessons courses
     *
     * @return App\Services\CommentService
    **/
    public function comment($userId, $elementId, $content, $element)
    {
        $contents = strip_tags($content);
        $comment = Comment::create([
                'user_id' => $userId,
                'commentable_id' => $elementId,
                'content' => $contents,
                'commentable_type' => $element,
        ]);
        $comment['userName'] = $comment->user->userProfile->name;
        $comment['userImage'] = $comment->user->userProfile->url;
        return $comment;
    }

     /**
     * Function handle reply comment to lesson
     *
     * @param LessonController $userId        user
     * @param LessonController $elementId     lessonid courseId
     * @param LessonController $content       content lesson
     * @param LessonController $parentComment parent id lesson
     * @param LessonController $element       lessons courses
     *
     * @return App\Services\CommentService
    **/
    public function reply($userId, $elementId, $content, $parentComment, $element)
    {
        $contents = strip_tags($content);
        $comment = Comment::create([
            'user_id' => $userId,
            'commentable_id' => $elementId,
            'content' => $contents,
            'commentable_type' => $element,
            'parent_id' => $parentComment,
        ]);
        $comment['userName'] = $comment->user->userProfile->name;
        $comment['userImage'] = $comment->user->userProfile->url;
        return $comment;
    }

    /**
     * Function destroy comment
     *
     * @param Comment $userId    user
     * @param Comment $commentId comment
     *
     * @return App\Services\CommentService
    **/
    public function deleteComment($userId, $commentId)
    {
        $comment = Comment::find($commentId);
        if ($comment->user_id == $userId) {
            $comment->delete();
            return ['id' => $commentId];
        }
        return null;
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

    /**
     * Function destroy comment
     *
     * @param Comment $userId    user
     * @param Comment $commentId comment
     *
     * @return App\Services\CommentService
    **/
    public function editComment($userId, $commentId)
    {
        $comment = Comment::find($commentId);
        if ($comment->user_id == $userId) {
            $comment->delete();
            return ['id' => $commentId];
        }
        return null;
    }
}
