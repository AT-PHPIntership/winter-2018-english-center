<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SearchService;

class SearchController extends Controller
{
    /**
     * Get user from keyword in search field
     *
     *@param request $request [request to get user]
     *
     * @return compare view
     */
    public function getUserEmail(Request $request)
    {
        // dd(1);
        if ($request->ajax()) {
            $response = app(SearchService::class)->ajaxGetUserEmail($request->get('query'));
            return response()->json($response);
        } else {
            $query = $request->get('search');
            $users = app(SearchService::class)->getUserEmail($query);
            return view('backend.users.search')->with(['users' => $users,'query' => $query]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request 
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteUser(Request $request)
    {
        $user_id = $request->get('user-id');
        $response = app(SearchService::class)->delete($user_id);
        return response()->json($response);
    }

    /**
     * Get course from keyword in search field
     *
     *@param request $request [request to get course]
     *
     * @return compare view
     */
    public function getCourseName(Request $request)
    {
        // dd(1);
        if ($request->ajax()) {
            $response = app(SearchService::class)->ajaxGetCourseName($request->get('query'));
            return response()->json($response);
        } else {
            $query = $request->get('search');
            $courses = app(SearchService::class)->getCourseName($query);
            return view('backend.courses.search')->with(['courses' => $courses,'query' => $query]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request 
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteCourse(Request $request)
    {
        $course_id = $request->get('course-id');
        $response = app(SearchService::class)->deleteCourse($course_id);
        return response()->json($response);
    }

    /**
     * Get lesson from keyword in search field
     *
     *@param request $request [request to get lesson]
     *
     * @return compare view
     */
    public function getLessonName(Request $request)
    {
        // dd(1);
        if ($request->ajax()) {
            $response = app(SearchService::class)->ajaxGetLessonName($request->get('query'));
            return response()->json($response);
        } else {
            $query = $request->get('search');
            $lessons = app(SearchService::class)->getLessonName($query);
            return view('backend.lessons.search')->with(['lessons' => $lessons,'query' => $query]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request 
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteLesson(Request $request)
    {
        $lesson_id = $request->get('lesson-id');
        $response = app(SearchService::class)->deleteLesson($lesson_id);
        return response()->json($response);
    }

    /**
     * Get exercise from keyword in search field
     *
     *@param request $request [request to get exercise]
     *
     * @return compare view
     */
    public function getExerciseName(Request $request)
    {
        // dd(1);
        if ($request->ajax()) {
            $response = app(SearchService::class)->ajaxGetExerciseName($request->get('query'));
            return response()->json($response);
        } else {
            $query = $request->get('search');
            $exercises = app(SearchService::class)->getExerciseName($query);
            return view('backend.exercises.search')->with(['exercises' => $exercises,'query' => $query]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request 
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteExercise(Request $request)
    {
        $exercise_id = $request->get('exercise-id');
        $response = app(SearchService::class)->deleteExercise($exercise_id);
        return response()->json($response);
    }

    /**
     * Get comment from keyword in search field
     *
     *@param request $request [request to get comment]
     *
     * @return compare view
     */
    public function getCommentContent(Request $request)
    {
        // dd(1);
        if ($request->ajax()) {
            $response = app(SearchService::class)->ajaxGetCommentContent($request->get('query'));
            return response()->json($response);
        } else {
            $query = $request->get('search');
            $comments = app(SearchService::class)->getCommentContent($query);
            return view('backend.comments.search')->with(['comments' => $comments,'query' => $query]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request 
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteComment(Request $request)
    {
        $comment_id = $request->get('comment-id');
        $response = app(SearchService::class)->deleteComment($comment_id);
        return response()->json($response);
    }

    /**
     * Get comment from keyword in search field
     *
     *@param request $request [request to get comment]
     *
     * @return compare view
     */
    public function getVocabulary(Request $request)
    {
        // dd(1);
        if ($request->ajax()) {
            $response = app(SearchService::class)->ajaxGetVocabulary($request->get('query'));
            return response()->json($response);
        } else {
            $query = $request->get('search');
            $vocabularies = app(SearchService::class)->getVocabulary($query);
            return view('backend.vocabularies.search')->with(['vocabularies' => $vocabularies,'query' => $query]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request 
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteVocabulary(Request $request)
    {
        $vocabulary_id = $request->get('vocabulary-id');
        $response = app(SearchService::class)->deleteVocabulary($vocabulary_id);
        return response()->json($response);
    }
}
