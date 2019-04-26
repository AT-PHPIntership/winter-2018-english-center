<?php

namespace Tests\Browser\Admin\Auth;

use Laravel\Dusk\Browser;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Role;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\CreatesApplication;
use \Tests\Browser\Admin\AdminTestCase;

class LoginTest extends AdminTestCase
{
    use DatabaseMigrations;
    use CreatesApplication;

    /**
     * constructor
     *
     * @return void
     */
    public function setUp() : void
    {
        parent::setUp();
    }
    /**
     * A Dusk test for Login Admin.
     *
     * @return void
     */
    public function test_success_login_admin()
    { 
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                    ->assertSee('LOGIN')
                    ->type('email', $this->user->email)
                    ->type('password', '12345678')
                    ->press('LOGIN')
                    ->assertPathIs('/admin');
        });
    }

    /**
     * A Dusk test for Login Admin.
     *
     * @return void
     */
    public function test_fail_login_admin()
    {
       $this->browse(function (Browser $browser) {
           $browser->visit('/admin/login')
                   ->type('email', 'loginfail@gmail.com')
                   ->type('password', '12345678')
                   ->press('LOGIN')
                   ->assertSee('These credentials do not match our records.');    
       });
   }

   /**
     * A Dusk test for Logout Admin account.
     *
     * @return void
     */
    public function test_logout_admin()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit('/admin')
                    ->assertSee('Phan Thi Cam')
                    ->click('.dropdown-toggle')
                    ->assertVisible('.btn')
                    ->visit(
                        $browser->attribute('.btn', 'href')
                    )
                    ->assertPathIs('/admin/login');
        });
    }

    /**
     * A Dusk test for Login Not be Admin.
     *
     * @return void
     */
    public function test_login_admin_by_user()
    {
        $user = User::create([
            'email' => 'user@laravel.com',
            'email_verified_at' => now(),
            'password' => '12345678',
            'role_id' => 2,
            'remember_token' => str_random(10),
        ]);
        $userProfile = UserProfile::create([
            'name' => 'Phan Thi Cam',
            'age' => 23,
            'url' => 'a7264869-7081-3e23-83ff-cf4ddf87178f_avatar5.jpeg',
            'birthday' => '1997-07-07',
            'phone' => '0384238398',
            'user_id' => $user->id,
        ]);
        $this->browse(function (Browser $browser) use ($user) {
             $browser->visit('/admin/login')
                     ->type('email', $user->email)
                     ->type('password', '12345678')
                     ->press('LOGIN')
                     ->assertSee('Your account is not access. Please try again!')
                     ->assertPathIs('/admin/login');
        });
    }


}
