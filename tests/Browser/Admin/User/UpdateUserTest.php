<?php

namespace Tests\Browser\Admin\User;

use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Admin\AdminTestCase;
use App\Models\User;
use Tests\Browser\Pages\Admin\User\UpdateUser;
use App\Models\UserProfile;

class UpdateUserTest extends AdminTestCase
{
    use DatabaseMigrations;

    /**
    * Override function setUp() for make user login
    *
    * @return void
    */
    public function setUp() : void
    {
        parent::setUp();
        factory(User::class)->create();
        factory(UserProfile::class)->create([
            'user_id' => 2
        ]);
    }

    /**
     * Test update user url
     *
     * @return void
     */
    public function test_update_user_url()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new UpdateUser);
        });
    }

    /**
     * List case for test validate for input
     *
     * @return array
     */
    public function list_test_case_update_user_validate()
    {
        return [
            ['name', '', 'The name field is required.'],
            ['email', '', 'The email field is required.'],
            ['birthday', '', 'The birthday field is required.'],
            ['phone', '', 'The phone field is required.'],
        ];
    }

    /**
     * Dusk test validate for input
     *
     * @param string $name name of field
     * @param string $content content
     * @param string $message message show when validate
     *
     * @dataProvider list_test_case_update_user_validate
     *
     * @return void
     */
    public function test_update_user_validate($name, $content, $message)
    {
        $this->browse(function (Browser $browser) use ($name, $content, $message) {
            $browser->loginAs($this->user)
                    ->visit(new UpdateUser)
                    ->type($name, $content)
                    ->press(__('common.btn'))
                    ->assertSee($message);
        });
    }

    /**
     * Dusk test update user success.
     *
     * @return void
     */
    public function test_update_user_success()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                ->visit(new UpdateUser)
                ->assertSee(__('user.edit_user.title'))
                ->type('name', 'Tieu Vy')
                ->type('phone', '0384238398')
                ->press(__('common.btn'))
                ->assertPathIs('/admin/users')
                ->assertSee(__('common.success'));
            $this->assertDatabaseHas('user_profiles', [
                'name' => 'Tieu Vy',
                'phone' => '0384238398',
            ]);
        });
    }
}
