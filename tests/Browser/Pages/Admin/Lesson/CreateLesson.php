<?php

namespace Tests\Browser\Pages\Admin\Lesson;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class CreateLesson extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/lessons/create';
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
                ->assertSee('Create Lesson');
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
