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
}
