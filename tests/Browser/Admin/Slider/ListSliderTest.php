<?php

namespace Tests\Browser\Admin\Slider;

use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Admin\AdminTestCase;
use App\Models\Slider;
use Tests\Browser\Pages\Admin\Slider\ListSlider;

class ListSliderTest extends AdminTestCase
{
    use DatabaseMigrations;

    const NUMBER_RECORD = 2;

    /**
    * Override function setUp()
    *
    * @return void
    */
    public function setUp() : void
    {
        parent::setUp();
        factory(Slider::class, self::NUMBER_RECORD)->create();
    }

    /**
     * A Dusk test show list slider.
     *
     * @return void
     */
    public function test_show_list_slider()
    {
        dd(1);
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new ListSlider);
        });
    }

    /**
     * A Dusk test show record with table has data.
     *
     * @return void
     */
    public function test_show_record_slider()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new ListSlider);
            $elements = $browser->elements('.table tbody tr');
            $this->assertCount(self::NUMBER_RECORD, $elements);
        });
    }
}
