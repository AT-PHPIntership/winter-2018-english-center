<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'role_id' => $faker->randomElement([1,2,3]),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Course::class, function(Faker $faker) {
    return [
        'title' => $faker->catchPhrase,
        'parent_id' => null,
        'count_view' => $faker->randomDigit,
        'total_rating' => $faker->numberBetween(1, 10),
        'average' => $faker->numberBetween(1, 5),
        'flag' => $faker->boolean,
    ];
});

$factory->state(App\Models\Course::class, 'child', function(Faker $faker) {
    return [
        'parent_id' => factory('App\Models\Course')->create()->id,
    ];
});

$factory->define(App\Models\Lession::class, function(Faker $faker) {
    return [
        'course_id' => factory('App\Models\Course')->create()->id,
        'name' => $faker->catchPhrase,
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'video'=> $faker->url,
        'count_view' => $faker->randomDigit,
        'total_rating' => $faker->numberBetween(1, 10),
        'average' => $faker->numberBetween(1, 5),
        'level_id' => $faker->randomElement([1,2,3]),
        'role' => $faker->boolean,
    ];
});

$factory->define(App\Models\Vocabulary::class, function(Faker $faker) {
    return [
        'title' => $faker->catchPhrase,
        'content' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'sound' => $faker->url,
    ];
});
