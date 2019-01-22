<?php  
namespace App\Services;
use App\Models\Comment;

class CommentService
{
    public function index()
    {
        $comments = Comment::orderBy('created_at', config('define.courses.order_by_desc'))->paginate(config('define.courses.limit_rows'));
        return $comments;
    }
}

?>
