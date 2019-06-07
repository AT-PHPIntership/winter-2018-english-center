<?php

namespace Tests\Browser\Admin\Slider;

use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Admin\AdminTestCase;
use Tests\Browser\Pages\Admin\Slider\CreateSlider;

class CreateSliderTest extends AdminTestCase
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
    }

    /**
     * A Dusk test create user.
     *
     * @return void
     */
    public function test_create_slider()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new CreateSlider);
        });
    }

    /**
     * List case for test validate for input
     *
     * @return array
     */
    public function list_test_case_validate_create_slider()
    {
        return [
            ['title', '', 'The title field is required.'],
            // ['content', '', 'The content field is required.'],
            ['image', '', 'The image field is required.'],
        ];
    }

    /**
     * Dusk test validate for input
     *
     * @param string $name name of field
     * @param string $content content
     * @param string $message message show when validate
     *
     * @dataProvider list_test_case_validate_create_slider
     *
     * @return void
     */
    public function test_validate_create_slider($name, $content, $message)
    {
        $this->browse(function (Browser $browser) use ($name, $content, $message) {
            $browser->loginAs($this->user)
                    ->visit(new CreateSlider)
                    ->type($name, $content)
                    ->press(__('common.btn'))
                    ->assertSee($message);
        });
    }
}
