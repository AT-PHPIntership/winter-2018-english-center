<?php

namespace App\Services;

use App\Models\User;

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
        // if($users->first() != null) {
            $items = [];
            foreach ($users as $key => $user) {
                $items[$key]['id'] = $user->id;
                $items[$key]['email'] = $user->email;
                $items[$key]['role'] = $user->role->name;
            }
            return $items;
        // } else {
        //     return null;
        // }
        
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
     * Function destroy course
     *
     * @param User $user user
     *
     * @return App\Services\CourseService
    **/
    public function delete($user_id)
    {
        $user = User::find($user_id);
        $user->delete();
        return $user_id;
    }
}
