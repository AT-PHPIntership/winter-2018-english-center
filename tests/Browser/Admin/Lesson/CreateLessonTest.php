<?php

namespace Tests\Browser\Admin\Lesson;

use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Admin\AdminTestCase;
use Tests\Browser\Pages\Admin\Lesson\CreateLesson;
use App\Models\Level;
use App\Models\Course;
use App\Models\Vocabulary;
use Carbon\Carbon;
use Facebook\WebDriver\WebDriverBy;

class CreateLessonTest extends AdminTestCase
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
    }

    /**
     * A Dusk test create user.
     *
     * @return void
     */
    public function test_create_lesson()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new CreateLesson);
        });
    }

    /**
     * List case for test validate for input
     *
     * @return array
     */
    public function list_test_case_validate_create_lesson()
    {
        return [
            ['name', '', 'The name field is required.'],
            // ['text', '', 'The text field is required.'],
            // ['level_id', '', 'The level_id field is required.'],
            // ['course_id', '', 'The course_id field is required.'],
            // ['vocabularies_id', '', 'The vocabularies_id field is required.'],
            ['image', '', 'The image field is required.'],
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
     * @dataProvider list_test_case_validate_create_lesson
     *
     * @return void
     */
    public function test_validate_create_lesson($name, $content, $message)
    {
        $this->browse(function (Browser $browser) use ($name, $content, $message) {
            $browser->loginAs($this->user)
                    ->visit(new CreateLesson)
                    ->type($name, $content)
                    ->press(__('common.btn'))
                    ->assertSee($message);
        });
    }

    /**
     * A Dusk interact with CKEditor.
     *
     * @return void
     */
    public function typeInCKEditor ($selector, $browser)
    {
        $ckIframe = $browser->elements($selector)[0];
        $browser->driver->switchTo()->frame($ckIframe);
        $body = $browser->driver->findElement(WebDriverBy::xpath('//body'));
        $body->sendKeys('text 1');
        $browser->driver->switchTo()->defaultContent();
    }

    /**
     * A Dusk test create lesson success.
     *
     * @return void
     */
    public function test_create_lesson_success()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new CreateLesson)
                    ->type('name', 'Lesson 1');
            $this->typeInCKEditor('#cke_1_contents iframe', $browser);
            $browser->select('level_id', '1')
                    ->select('course_id', '2')
                    ->select2('#list-vocalbularies', 'inu')
                    ->attach('image', __DIR__.'/image/1.jpg')
                    ->type('video', 'https://www.youtube.com/embed/IpniN1Wq68Y')
                    ->press(__('common.btn'))
                    ->assertSee(__('common.success'))
                    ->assertPathIs('/admin/lessons');
            $this->assertDatabaseHas(
                'lessons', [
                    'name' => 'Lesson 1',
                    'text' => '<p>text 1</p>',
                    'level_id' => '1',
                    'course_id' => '2',
                    'video' => 'https://www.youtube.com/embed/IpniN1Wq68Y',
                ]);
        });
    }
}
