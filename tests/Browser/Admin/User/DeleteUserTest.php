<?php

namespace Tests\Browser\Admin\User;

use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Admin\AdminTestCase;
use App\Models\User;
use App\Models\UserProfile;

class DeleteUserTest extends AdminTestCase
{
    use DatabaseMigrations;

    protected $userDel;

    /**
    * Override function setUp() database
    *
    * @return void
    */
    public function setUp() : void
    {
        parent::setUp();
        $this->userDel = factory(User::class)->create([
            'role_id' => '3'
        ]);
        $userDelProfile = factory(UserProfile::class)->create([
            'user_id' => '2'
        ]);
    }

    /**
     * Test button delete user
     *
     * @return void
     */
    public function test_cancel_confirm_delete()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                ->visit('/admin/users')
                ->assertSee('List Users')
                ->press('Delete')
                ->assertDialogOpened(__('js.delete'))
                ->dismissDialog();
            $this->assertDatabaseHas('users', ['id' => 2]);
            $this->assertDatabaseHas('user_profiles', ['user_id' => 2]);
        });
    }

     /**
     * Test click button Delete
     *
     * @return void
     */
    public function test_confirm_delete()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                ->visit('/admin/users')
                ->assertSee('List Users')
                ->press('Delete')
                ->assertDialogOpened(__('js.delete'))
                ->acceptDialog()
                ->assertSee(__('common.success'));
            $this->assertDatabaseMissing('users', ['id' => 2]);
            $this->assertDatabaseMissing('user_profiles', ['user_id' => 2]);
        });
    }
}
