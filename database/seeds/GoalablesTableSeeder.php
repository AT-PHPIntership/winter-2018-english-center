<?php

use Illuminate\Database\Seeder;

class GoalablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Goalable::class, 10)->create();
    }
}
