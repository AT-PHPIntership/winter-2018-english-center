<?php

namespace Tests;

use DB;
use App\Models\User;
use App\Models\Role;
use App\Models\UserProfile;
use Carbon\Carbon;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\CreatesApplication;

class AdminTestCase extends DuskTestCase
{
    use CreatesApplication;
    use DatabaseMigrations;

    protected $user;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('roles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('roles')->insert([
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

       $this->user = factory(User::class)->create([
            'email' => 'phuongtran@gmail.com',
            'password' => '12345',
            'role_id' => '1',
            'is_actived' => '1',
            'remember_token' => str_random(10)
        ]);

        $this->userProfile = UserProfile::create([
           'name' => 'Phuong Tran',
           'age' => 22,
           'url' => 'a7264869-7081-3e23-83ff-cf4ddf87178f_avatar5.jpeg',
           'birthday' => '1997-07-07',
           'phone' => '0384238398',
           'user_id' => $this->user->id,
       ]);
    }
}
