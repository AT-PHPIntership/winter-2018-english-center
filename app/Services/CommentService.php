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
        $comment = Comment::create([
                'user_id' => $userId,
                'commentable_id' => $elementId,
                'content' => $content,
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
        $comment = Comment::create([
            'user_id' => $userId,
            'commentable_id' => $elementId,
            'content' => $content,
            'commentable_type' => $element,
            'parent_id' => $parentComment,
        ]);
        $comment['userName'] = $comment->user->userProfile->name;
        $comment['userImage'] = $comment->user->userProfile->url;
        return $comment;
    }

    public function deleteComment($userId, $commentId)
    {
        $comment = Comment::find($commentId); 
        if ($comment->user_id == $userId) {
            $comment->delete();
            return ['id' => $commentId];
        }
        return null;
    }
}
