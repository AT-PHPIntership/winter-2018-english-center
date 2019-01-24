<?php

use Illuminate\Database\Seeder;
use App\Models\System;

class SystemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\System::class, 1)->create();
    }
}
