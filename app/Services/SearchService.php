<?php

namespace App\Services;

use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;

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

}
