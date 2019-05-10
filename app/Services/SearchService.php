<?php

namespace App\Services;

use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Exercise;
use App\Models\Comment;

class SearchService
{
    /**
     * Get users based on query
     *
     * @param object $query [query get user]
     *
     * @return collection
     */
    public function ajaxGetUserEmail($query)
    {
        $users = User::where('email', 'LIKE', "%{$query}%")->get();
            $items = [];
            foreach ($users as $key => $user) {
                $items[$key]['id'] = $user->id;
                $items[$key]['email'] = $user->email;
                $items[$key]['role'] = $user->role->name;
            }
            return $items;
    }

    /**
     * Get users based on query
     *
     * @param object $query [query get user]
     *
     * @return collection
     */
    public function getUserEmail($query)
    {
        return User::where('email', 'LIKE', "%{$query}%")->paginate(config('define.page_site'))->appends(['search'=> $query]);
    }

    /**
     * Function destroy user
     *
     * @param User $user user
     *
     * @return App\Services\SearchService
    **/
    public function delete($user_id)
    {
        $user = User::find($user_id);
        $user->delete();
        return $user_id;
    }

    /**
     * Get course based on query
     *
     * @param object $query [query get course]
     *
     * @return collection
     */
    public function ajaxGetCourseName($query)
    {
        $courses = Course::where('name', 'LIKE', "%{$query}%")->get();
            $items = [];
            foreach ($courses as $key => $course) {
                $items[$key]['id'] = $course->id;
                $items[$key]['name'] = $course->name;
                if($course->parent_id == null) {
                    $items[$key]['course_parent'] = 'none';
                } else {
                    $items[$key]['course_parent'] = $course->parent->name;
                }
                $items[$key]['view'] = $course->count_view;
                $items[$key]['rating'] = $course->average;
                if($course->parent_id == null) {
                    $items[$key]['content'] = 'none';
                } else {
                    $items[$key]['content'] = str_limit($course->content, 160);
                }
            }
            return $items;
    }

    /**
     * Get course based on query
     *
     * @param object $query [query get course]
     *
     * @return collection
     */
    public function getCourseName($query)
    {
        return Course::where('name', 'LIKE', "%{$query}%")->paginate(config('define.page_site'))->appends(['search'=> $query]);
    }

    /**
     * Function destroy course
     *
     * @param Course $id
     *
     * @return App\Services\SearchService
    **/
    public function deleteCourse($id)
    {
        $course = Course::find($id);
        if ($course->parent ===  null) {
            Course::where('id', $id)->orWhere('parent_id', $id)->delete();
        } else {
            Course::where('id', $id)->delete();
        }
        return $id;
    }

    /**
     * Get lesson based on query
     *
     * @param object $query [query get lesson]
     *
     * @return collection
     */
    public function getLessonName($query)
    {
        return Lesson::where('name', 'LIKE', "%{$query}%")->paginate(config('define.page_site'))->appends(['search'=> $query]);
    }

    /**
     * Get lesson based on query
     *
     * @param object $query [query get lesson]
     *
     * @return collection
     */
    public function ajaxGetLessonName($query)
    {
        $lessons = Lesson::where('name', 'LIKE', "%{$query}%")->get();
            $items = [];
            foreach ($lessons as $key => $lesson) {
                $items[$key]['id'] = $lesson->id;
                $items[$key]['name'] = $lesson->name;
                $items[$key]['course'] = $lesson->course->name;
                $items[$key]['level'] = $lesson->level->level;
            }
            return $items;
    }

    /**
     * Function destroy lesson
     *
     * @param Lesson $id
     *
     * @return App\Services\SearchService
    **/
    public function deleteLesson($id)
    {
        $lesson = Lesson::find($id);
        $lesson->vocabularies()->detach();
        $lesson->delete();
        return $id;
    }

    /**
     * Get exercise based on query
     *
     * @param object $query [query get exercise]
     *
     * @return collection
     */
    public function getExerciseName($query)
    {
        return Exercise::where('title', 'LIKE', "%{$query}%")->paginate(config('define.page_site'))->appends(['search'=> $query]);
    }

    /**
     * Get exercise based on query
     *
     * @param object $query [query get exercise]
     *
     * @return collection
     */
    public function ajaxGetExerciseName($query)
    {
        $exercises = Exercise::where('title', 'LIKE', "%{$query}%")->get();
            $items = [];
            foreach ($exercises as $key => $exercise) {
                $items[$key]['id'] = $exercise->id;
                $items[$key]['title'] = $exercise->title;
                $items[$key]['lesson'] = $exercise->lesson->name;
            }
            return $items;
    }

    /**
     * Function destroy exercise
     *
     * @param Exercise $id
     *
     * @return App\Services\SearchService
    **/
    public function deleteExercise($id)
    {
        $exercise = Exercise::find($id);
        $exercise->delete();
        return $id;
    }

    /**
     * Get comment based on query
     *
     * @param object $query [query get comment]
     *
     * @return collection
     */
    public function getCommentContent($query)
    {
        $comments = Comment::join('user_profiles', 'comments.user_id', '=', 'user_profiles.user_id')
                    ->where('content', 'LIKE', "%{$query}%")
                    ->orWhere('name', 'LIKE', "%{$query}%")
                    ->paginate(config('define.page_site'))->appends(['search'=> $query]);
        return $comments;
    }

    /**
     * Get comment based on query
     *
     * @param object $query [query get comment]
     *
     * @return collection
     */
    public function ajaxGetCommentContent($query)
    {
        $comments = Comment::join('user_profiles', 'comments.user_id', '=', 'user_profiles.user_id')
                    ->select('comments.*')
                    ->where('content', 'LIKE', "%{$query}%")
                    ->orWhere('name', 'LIKE', "%{$query}%")
                    ->get();
            $items = [];
            // \Log::info($comments);
            foreach ($comments as $key => $comment) {
                $items[$key]['id'] = $comment->id;
                $items[$key]['userName'] = $comment->user->userProfile->name;
                $items[$key]['courseOrLesson'] = $comment->commentable->name;
                $items[$key]['content'] = $comment->content;
            }
            return $items;
    }

    /**
     * Function destroy comment
     *
     * @param Comment $id
     *
     * @return App\Services\SearchService
    **/
    public function deleteComment($id)
    {
        $comment = Comment::find($id);
        if ($comment->parent === null) {
            Comment::where('id', $id)->orWhere('parent_id', $id)->delete();
        } else {
            Comment::where('id', $id)->delete();
        }
        return $id;
    }
}
