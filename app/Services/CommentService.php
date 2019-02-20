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
     * @param LessonController $userId   user
     * @param LessonController $lessonId lessonid
     * @param LessonController $content  content lesson
     *
     * @return App\Services\CommentService
    **/
    public function comment($userId, $lessonId, $content)
    {
        $comment = Comment::create([
            'user_id' => $userId,
            'commentable_id' => $lessonId,
            'content' => $content,
            'commentable_type' => 'lessons',
        ]);
        $comment['userName'] = $comment->user->userProfile->name;
        $comment['userImage'] = $comment->user->userProfile->url;
        return $comment;
    }

     /**
     * Function handle reply comment to lesson
     *
     * @param LessonController $userId        user
     * @param LessonController $lessonId      lessonid
     * @param LessonController $content       content lesson
     * @param LessonController $parentComment parent id lesson
     *
     * @return App\Services\CommentService
    **/
    public function reply($userId, $lessonId, $content, $parentComment)
    {
        $comment = Comment::create([
            'user_id' => $userId,
            'commentable_id' => $lessonId,
            'content' => $content,
            'commentable_type' => 'lessons',
            'parent_id' => $parentComment
        ]);
        $comment['userName'] = $comment->user->userProfile->name;
        $comment['userImage'] = $comment->user->userProfile->url;
        return $comment;
    }
}
