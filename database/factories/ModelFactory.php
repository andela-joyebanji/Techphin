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
        'image'     => asset('img/profile-placeholder.png'),
    ];
});

$factory->define(Pyjac\Techphin\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->word,
        'icon' => $faker->randomElement(['devicon-php-plain', 'devicon-laravel-plain', 'devicon-javascript-plain', 'devicon-angularjs-plain']),
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
        'user_id'     => factory(Pyjac\Techphin\User::class)->create()->id,
        'category_id' => factory(Pyjac\Techphin\Category::class)->create()->id,
    ];
});

$factory->define(Pyjac\Techphin\SocialAccount::class, function (Faker\Generator $faker) {

    return [
            'provider_user_id' => $faker->ean8,
            'provider'         => $faker->firstName,
            'user_id'          => function () {
                return factory(Pyjac\Techphin\User::class)->create()->id;
            },
        ];
});
