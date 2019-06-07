<?php

namespace Tests\Browser\Admin\Slider;

use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Admin\AdminTestCase;
use App\Models\Slider;
use Tests\Browser\Pages\Admin\Slider\UpdateSlider;

class UpdateSliderTest extends AdminTestCase
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
     * Test update user url
     *
     * @return void
     */
    public function test_update_slider()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new UpdateSlider);
        });
    }

    /**
     * List case for test validate for input
     *
     * @return array
     */
    public function list_test_case_update_slider_validate()
    {
        return [
            ['title', '', 'The title field is required.'],
            // ['content', '', 'The content field is required.'],
        ];
    }

    /**
     * Dusk test validate for input
     *
     * @param string $name name of field
     * @param string $content content
     * @param string $message message show when validate
     *
     * @dataProvider list_test_case_update_slider_validate
     *
     * @return void
     */
    public function test_update_slider_validate($name, $content, $message)
    {
        $this->browse(function (Browser $browser) use ($name, $content, $message) {
            $browser->loginAs($this->user)
                    ->visit(new UpdateSlider)
                    ->type($name, $content)
                    ->press(__('common.btn'))
                    ->assertSee($message);
        });
    }

    /**
     * Dusk test update slider success.
     *
     * @return void
     */
    public function test_update_slider_success()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                ->visit(new UpdateSlider)
                ->assertSee(__('layout_admin.slider.edit.title'))
                ->type('title', 'Why Us')
                ->press(__('common.btn'))
                ->assertPathIs('/admin/sliders')
                ->assertSee(__('common.success'));
            $this->assertDatabaseHas('sliders', [
                'title' => 'Why Us',
            ]);
        });
    }
}
