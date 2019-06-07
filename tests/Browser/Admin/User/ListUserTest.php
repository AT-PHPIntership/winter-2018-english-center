<?php

namespace Tests\Browser\Admin\User;

use Laravel\Dusk\Browser;
use Tests\Browser\Admin\AdminTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\User;
use Tests\Browser\Pages\Admin\User\ListUser;

class ListUserTest extends AdminTestCase
{
    use DatabaseMigrations;

    const NUMBER_RECORD = 25;
    const ROW_LIMIT = 20;

    /**
    * Override function setUp() for make user login
    *
    * @return void
    */
    public function setUp() : void
    {
        parent::setUp();
        factory(User::class, self::NUMBER_RECORD)->create();
    }

    /**
     * A Dusk test show list user.
     *
     * @return void
     */
    public function test_show_list_user()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new ListUser);
        });
    }

    /**
     * A Dusk test show record with table has data.
     *
     * @return void
     */
    public function test_show_record()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new ListUser);
            $elements = $browser->elements('.table tbody tr');
            $this->assertCount(self::ROW_LIMIT, $elements);
        });
    }

    /**
     * Test view Admin List Users with pagination
     *
     * @return void
     */
    public function test_list_users_pagination()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new ListUser);
            $number_page = count($browser->elements('.pagination li')) - 2;
            $this->assertEquals($number_page, ceil((self::NUMBER_RECORD) / (self::ROW_LIMIT)));
        });
    }
}
