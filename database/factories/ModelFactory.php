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

$factory->define(Pyjac\Techphin\User::class, function (Faker\Generator $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname'  => $faker->lastName,
        'username'  => $faker->userName,
        'email'     => $faker->safeEmail,
        'password'  => bcrypt(str_random(10)),
        'role'      => 'user',
        'image'     => asset('img/profile-placeholder.png')
    ];
});

$factory->define(Pyjac\Techphin\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->word,
    ];
});

$factory->define(Pyjac\Techphin\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->word,
    ];
});

$factory->define(Pyjac\Techphin\Video::class, function (Faker\Generator $faker) {
    return [
        'title'       => $faker->name,
        'link'        => 'https://www.youtube.com/watch?v=Yhn5snJGvAo',
        'description' => $faker->sentence(10),
        'user_id'     => $faker->numberBetween(1, 10),
        'category_id' => $faker->numberBetween(1, 10)
    ];
});
