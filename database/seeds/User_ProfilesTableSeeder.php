<?php

use Illuminate\Database\Seeder;

class User_ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\UserProfile::class, 10)->create();
    }
}
