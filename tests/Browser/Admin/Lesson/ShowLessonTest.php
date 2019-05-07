<?php

namespace Tests\Browser\Admin\Lesson;

use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Admin\AdminTestCase;
use App\Models\Level;
use Carbon\Carbon;
use App\Models\Course;
use App\Models\Vocabulary;
use App\Models\Lesson;
use Tests\Browser\Pages\Admin\Lesson\ShowLesson;

class ShowLessonTest extends AdminTestCase
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
        \DB::table('m_level')->insert([
            [
                'level' => Level::LEVEL_BASIC,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'level' => Level::LEVEL_MEDIUM,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'level' => Level::LEVEL_ADVANCED,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
        factory(Course::class)->create();
        factory(Course::class)->create([
            'parent_id' => '1'
        ]);
        factory(Vocabulary::class)->create([
            'vocabulary' => 'inu'
        ]);
        factory(Lesson::class)->create([
            'course_id' => 2,
            'level_id' => 1
        ]);
    }

    /**
     * Test show lesson url
     *
     * @return void
     */
    public function test_show_lesson_url()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new ShowLesson);
        });
    }
}
