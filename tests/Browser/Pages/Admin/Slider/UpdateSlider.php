<?php

namespace Tests\Browser\Pages\Admin\Slider;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class UpdateSlider extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/sliders/1/edit';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url())
                ->assertSee(__('layout_admin.slider.edit.title'))
                ->assertSee(__('common.btn'));
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@element' => '#selector',
        ];
    }
}
