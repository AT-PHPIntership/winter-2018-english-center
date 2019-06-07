<?php

namespace Tests\Browser\Pages\Admin\Lesson;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class ShowLesson extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/lessons/1';
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
                ->assertSee('Lesson Detail')
                ->assertSee(__('common.back'));
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
