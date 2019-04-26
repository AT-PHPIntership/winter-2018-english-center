<?php

namespace Tests\Browser\Admin;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Role;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Carbon\Carbon;
use Tests\CreatesApplication;

class AdminTestCase extends DuskTestCase
{
    use CreatesApplication;
    use DatabaseMigrations;

    protected $user;
    protected $userProfile;

    /**
     * constructor
     *
     * @return void
     */
    public function setUp() : void
    {
        parent::setUp();
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('roles')->truncate();
        \DB::table('users')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        \DB::table('roles')->insert([
            [
                'name' => Role::ROLE_ADMIN,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => Role::ROLE_TRIAL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => Role::ROLE_VIP,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
        $this->user = User::create([
            'email' => 'admin@laravel.com',
            'email_verified_at' => now(),
            'password' => '12345678',
            'role_id' => 1,
            'remember_token' => str_random(10),
        ]);
        $this->userProfile = UserProfile::create([
            'name' => 'Phan Thi Cam',
            'age' => 23,
            'url' => 'a7264869-7081-3e23-83ff-cf4ddf87178f_avatar5.jpeg',
            'birthday' => '1997-07-07',
            'phone' => '0384238398',
            'user_id' => $this->user->id,
        ]);
    }
}
