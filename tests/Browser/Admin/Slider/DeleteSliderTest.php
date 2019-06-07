<?php

namespace Tests\Browser\Admin\Slider;

use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Admin\AdminTestCase;
use App\Models\Slider;

class DeleteSliderTest extends AdminTestCase
{
    use DatabaseMigrations;

    /**
    * Override function setUp()
    *
    * @return void
    */
    public function setUp() : void
    {
        parent::setUp();
        factory(Slider::class)->create();
    }

    /**
     * Test click button Delete cancel
     *
     * @return void
     */
    public function test_cancel_confirm_delete_slider()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                ->visit('/admin/sliders')
                ->assertSee('List Sliders')
                ->press('Delete')
                ->assertDialogOpened(__('js.delete'))
                ->dismissDialog();
            $this->assertDatabaseHas('sliders', ['id' => 1]);
        });
    }

    /**
     * Test click button Delete confirm
     *
     * @return void
     */
    public function test_confirm_delete_slider()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                ->visit('/admin/sliders')
                ->assertSee('List Sliders')
                ->press('Delete')
                ->assertDialogOpened(__('js.delete'))
                ->acceptDialog()
                ->assertSee(__('common.success'));
            $this->assertDatabaseMissing('sliders', ['id' => 1]);
        });
    }
}
