<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Handle the user "deleting" event.
     *
     * @param \App\User $user User
     *
     * @return void
     */
    public function deleting(User $user)
    {
        $user->userProfile->delete();
    }
}
