<?php

namespace Tests\Browser\Admin\System;

use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Admin\AdminTestCase;
use App\Models\System;
use Tests\Browser\Pages\Admin\System\UpdateSystem;

class UpdateSystemTest extends AdminTestCase
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
        factory(System::class)->create();
    }

    /**
     * Test update system
     *
     * @return void
     */
    public function test_update_system_url()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new UpdateSystem);
        });
    }

    /**
     * List case for test validate for input
     *
     * @return array
     */
    public function list_test_case_update_system_validate()
    {
        return [
            // ['whyus', '', 'The whyus field is required.'],
            // ['aboutus', '', 'The aboutus field is required.'],
            ['phone', '', 'The phone field is required.'],
            ['email', '', 'The email field is required.'],
            ['web', '', 'The web field is required.'],
            ['address', '', 'The address field is required.'],
        ];
    }

    /**
     * Dusk test validate for input
     *
     * @param string $name name of field
     * @param string $content content
     * @param string $message message show when validate
     *
     * @dataProvider list_test_case_update_system_validate
     *
     * @return void
     */
    public function test_update_system_validate($name, $content, $message)
    {
        $this->browse(function (Browser $browser) use ($name, $content, $message) {
            $browser->loginAs($this->user)
                    ->visit(new UpdateSystem)
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
    public function test_update_system_success()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                ->visit(new UpdateSystem)
                ->assertSee(__('layout_admin.system.edit.title'))
                ->type('email', 'englishcenter@asiantech.vn')
                ->type('phone', '0384238398')
                ->press(__('common.btn'))
                ->assertPathIs('/admin/systems')
                ->assertSee(__('common.success'));
            $this->assertDatabaseHas('systems', [
                'email' => 'englishcenter@asiantech.vn',
                'phone' => '0384238398',
            ]);
        });
    }
}
