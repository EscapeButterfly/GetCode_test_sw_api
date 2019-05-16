<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;
use GetCode\SW\Models\People;

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

$factory->define(People::class, function (Faker $faker) {
    return [
        'name'         => $faker->name,
        'height'       => $faker->numberBetween(60, 220),
        'mass'         => $faker->numberBetween(10, 600),
        'hair_color'   => $faker->colorName,
        'birth_year'   => $faker->numberBetween(1, 200) . 'BBY',
        'gender'       => $faker->randomElement(['male', 'female', 'n/a']),
        'created'      => \Carbon\Carbon::now(),
        'url'          => $faker->url
    ];
});
