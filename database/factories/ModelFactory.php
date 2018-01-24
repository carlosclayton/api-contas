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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(ApiContas\Models\User::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->state(\ApiContas\Models\User::class, 'admin',  function (Faker\Generator $faker) {
    return [
        'role' => \ApiContas\Models\User::ROLE_ADMIN,
    ];
});

$factory->state(\ApiContas\Models\User::class, 'client',  function (Faker\Generator $faker) {
    return [
        'role' => \ApiContas\Models\User::ROLE_CLIENT,
    ];
});

$factory->define(ApiContas\Models\Bills::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence(5),
        'value' => rand(1,100),
        'done' => rand(0,1)
    ];
});


