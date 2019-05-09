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
}
