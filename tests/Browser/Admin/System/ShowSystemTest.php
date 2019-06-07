<?php

namespace Tests\Browser\Admin\System;

use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Admin\AdminTestCase;
use Tests\Browser\Pages\Admin\System\ShowSystem;
use App\Models\System;

class ShowSystemTest extends AdminTestCase
{
    use DatabaseMigrations;

    const NUMBER_RECORD = 1;

    /**
    * Override function setUp() for make user login
    *
    * @return void
    */
    public function setUp() : void
    {
        parent::setUp();
        factory(System::class, self::NUMBER_RECORD)->create();
    }

    /**
     * A Dusk test show system detail.
     *
     * @return void
     */
    public function test_show_system_detail()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new ShowSystem);
        });
    }

    /**
     * A Dusk test show record with table has data.
     *
     * @return void
     */
    public function test_show_system_record()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new ShowSystem);
            $elements = $browser->elements('.table tbody tr');
            $this->assertCount(self::NUMBER_RECORD, $elements);
        });
    }
}
