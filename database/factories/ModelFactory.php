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

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => 'admin',
        'email' => 'admin@qq.com',
        'password' => bcrypt(123456),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Form::class, function (Faker\Generator $faker) {
    return [
        'fid' => 'form_'.time().str_random(5),
    ];
});

$factory->define(App\Models\SingleLineFillBlank::class, function (Faker\Generator $faker) {
    return [
        'fid' => 'form_'.time().str_random(5),
        'gid' => 'div_add_'.$faker->uuid,
        'title'=> $faker->title,
        'subtitle'=>$faker->title,
        'placeholder'=>$faker->lastName,
        'minchar'=>$faker->numberBetween(0,100),
        'maxchar'=>$faker->randomNumber(),
    ];
});
