<?php

namespace Tests\Browser\Pages\Admin\System;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class UpdateSystem extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/systems/1/edit';
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
                ->assertSee(__('layout_admin.system.edit.title'))
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
