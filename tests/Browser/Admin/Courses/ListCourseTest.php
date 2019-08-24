<?php

namespace Tests\Browser\Admin\Courses;

use App\Models\Course;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Tests\AdminTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Admin\Courses\ListCoursePage;

class ListCourseTest extends AdminTestCase
{
    use DatabaseMigrations;

    public const NUMBER_COURSE_CREATE = 25;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_show_all_course()
    {
        factory(Course::class, self::NUMBER_COURSE_CREATE)->create();
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new ListCoursePage);
            $this->assertEquals(self::NUMBER_COURSE_CREATE, count($browser->elements('@course')));
        });
    }
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_data_empty()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new ListCoursePage());
            $this->assertEquals(0, count($browser->elements('@course')));
        });
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_pagination()
    {
        factory(Course::class, self::NUMBER_COURSE_CREATE)->create();
        $this->browse(function ($browser) {
            $browser->loginAs($this->user)
                    ->visit(new ListCoursePage);
            $this->assertEquals(20, count($browser->elements('@course')));
            $browser->loginAs($this->user)
                    ->visit('admin/courses?page=2');
            $this->assertEquals(5, count($browser->elements('@course')));
        });
    }
}
