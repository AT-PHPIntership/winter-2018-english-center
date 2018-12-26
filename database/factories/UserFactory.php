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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
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
