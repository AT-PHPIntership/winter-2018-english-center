<?php

use Illuminate\Database\Seeder;

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $courseId = DB::table('courses')->pluck('id')->toArray();
        $levelId = DB::table('m_level')->pluck('id')->toArray();

        for ($i = 0; $i <= 5; $i++) {
            factory(App\Models\Lesson::class, 5)->create([
                'course_id' => $faker->randomElement($courseId),
                'level_id' => $faker->randomElement($levelId)
            ]);
        }
    }
}
