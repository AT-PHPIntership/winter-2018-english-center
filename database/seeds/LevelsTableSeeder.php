<?php

use Illuminate\Database\Seeder;
use App\Models\Level;
use Carbon\Carbon;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('levels')->insert([
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
    }
}
