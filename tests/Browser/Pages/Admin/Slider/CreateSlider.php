<?php

namespace Tests\Browser\Pages\Admin\Slider;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class CreateSlider extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/sliders/create';
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
                ->assertSee('Create Slider');
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
