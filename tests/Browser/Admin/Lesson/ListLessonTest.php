<?php

namespace Tests\Browser\Admin\Lesson;

use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Admin\AdminTestCase;
use App\Models\Lesson;
use Tests\Browser\Pages\Admin\Lesson\ListLesson;
use App\Models\Level;
use App\Models\Course;
use Carbon\Carbon;

class ListLessonTest extends AdminTestCase
{
    use DatabaseMigrations;

    const NUMBER_RECORD_LESSONS = 25;
    const NUMBER_RECORD_COURSES = 5;
    const ROW_LIMIT = 20;

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
        factory(Course::class, self::NUMBER_RECORD_COURSES)->create();
        $faker = \Faker\Factory::create();
        $courseParentId = \DB::table('courses')->whereNull('parent_id')->pluck('id')->toArray();
        $levelId = \DB::table('m_level')->pluck('id')->toArray();
        for ($i = 1; $i <= 5; $i++) {
            factory(Course::class)->create([
                    'parent_id' => $faker->randomElement($courseParentId)
                ]);
        }
        $courseChildId = \DB::table('courses')->whereNotNull('parent_id')->pluck('id')->toArray();
        for ($i = 1; $i <= self::NUMBER_RECORD_LESSONS; $i++) {
            factory(Lesson::class)->create([
                'course_id' => $faker->randomElement($courseChildId),
                'level_id' => $faker->randomElement($levelId)
            ]);
        }
    }

    /**
     * A Dusk test show list lessons.
     *
     * @return void
     */
    public function test_show_list_lessons()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new ListLesson);
        });
    }

    /**
     * A Dusk test show record with table has data.
     *
     * @return void
     */
    public function test_show_record_lessons()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new ListLesson);
            $elements = $browser->elements('.table tbody tr');
            $this->assertCount(self::ROW_LIMIT, $elements);
        });
    }


    /**
     * Test view Admin List Users with pagination
     *
     * @return void
     */
    public function test_list_lessons_pagination()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new ListLesson);
            $number_page = count($browser->elements('.pagination li')) - 2;
            $this->assertEquals($number_page, ceil((self::NUMBER_RECORD_LESSONS) / (self::ROW_LIMIT)));
        });
    }
}
