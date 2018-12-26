<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\UserProfile::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'age' => $faker->numberBetween($min = 10, $max = 100),
        'url' => $faker->imageUrl($width = 200, $height = 200),
        'birthday' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'phone' => '09'.$faker->randomNumber(8),
        'user_id' => factory(App\Models\User::class)->create()->id,
        'lession_level' => $faker->randomElement([1,2,3]),
        'course_level' => $faker->randomElement([1,2,3]),
    ];
});
