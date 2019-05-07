<?php

namespace Tests\Browser\Admin\Lesson;

use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Admin\AdminTestCase;
use App\Models\Course;
use App\Models\Vocabulary;
use App\Models\Level;
use Illuminate\Support\Carbon;
use App\Models\Lesson;
use Tests\Browser\Pages\Admin\Lesson\UpdateLesson;

class UpdateLessonTest extends AdminTestCase
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
     * Test update lesson url
     *
     * @return void
     */
    public function test_update_lesson_url()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new UpdateLesson);
        });
    }

    /**
     * List case for test validate for input
     *
     * @return array
     */
    public function list_test_case_update_lesson_validate()
    {
        return [
            ['name', '', 'The name field is required.'],
            // ['vocabularies_id', '', 'The vocabularies_id field is required.'],
            ['video', '', 'The video field is required.'],
        ];
    }

    /**
     * Dusk test validate for input
     *
     * @param string $name name of field
     * @param string $content content
     * @param string $message message show when validate
     *
     * @dataProvider list_test_case_update_lesson_validate
     *
     * @return void
     */
    public function test_update_lesson_validate($name, $content, $message)
    {
        $this->browse(function (Browser $browser) use ($name, $content, $message) {
            $browser->loginAs($this->user)
                    ->visit(new UpdateLesson)
                    ->type($name, $content)
                    ->press(__('common.btn'))
                    ->assertSee($message);
        });
    }

    /**
     * Dusk test update lesson success.
     *
     * @return void
     */
    public function test_update_lesson_success()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                ->visit(new UpdateLesson)
                ->assertSee(__('lesson.edit_lesson.title'))
                ->type('name', 'Lesson 1')
                ->select('level_id', '2')
                ->select2('#list-vocalbularies', 'inu')
                ->type('video', 'https://www.youtube.com/embed/IpniN1Wq68Y')
                ->press(__('common.btn'))
                ->assertPathIs('/admin/lessons')
                ->assertSee(__('common.success'));
                $this->assertDatabaseHas(
                    'lessons', [
                        'name' => 'Lesson 1',
                        'level_id' => '2',
                        'video' => 'https://www.youtube.com/embed/IpniN1Wq68Y',
                    ]);
        });
    }
}
