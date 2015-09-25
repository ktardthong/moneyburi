<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'firstname' => $faker->firstname,
        'firstname' => $faker->lastname,
        'email'     => $faker->email,
        'gender'    => 'male',
        'city'      => 'Bangkok',
        'country'   => 'Thailand',
        'birthdate' =>  '1990-01-01',
    ];
});