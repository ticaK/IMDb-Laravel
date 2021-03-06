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
$factory->define(App\Genre::class, function (Faker $faker) {
    $genres = ['drama','comedy','thriller','crime','fantasy','action','horror','western'] ;
       return [
        'name' => $faker->randomElement($genres)     
    ];
});