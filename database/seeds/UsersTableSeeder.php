<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(App\Models\User::class, 10)->create();
        foreach($users as $user) {
            factory(App\Models\UserProfile::class)->create(['user_id'=>$user->id]);
        };
    }
}
