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

$factory->define(App\Movie::class, function (Faker $faker) {
    return [
        'title' => $faker->words(2, true),
        'description' => $faker->paragraph(10, true),
        'image_url' => $faker->imageUrl(640, 480),
        'genre_id' => function() {
            return App\Genre::all()->random()->id;
        },
        'likes' => $faker->numberBetween(1, 100),
        'dislikes' => $faker->numberBetween(1, 100),
        'views' => $faker->numberBetween(100, 1000)

    ];
});
