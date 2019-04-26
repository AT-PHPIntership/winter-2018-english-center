<?php

namespace Tests\Browser\Pages\Admin\Courses;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class ListCoursePage extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/courses';
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
                ->assertSee('List Course')
                ->assertSee('ID')
                ->assertSee('Course Name')
                ->assertSee('Course Parent')
                ->assertSee('View')
                ->assertSee('Introduce Course')
                ->assertSee('Action');
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@course' => '.box-body table tbody tr',
        ];
    }
}
