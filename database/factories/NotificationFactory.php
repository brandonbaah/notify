<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Notification;
use Faker\Generator as Faker;

$factory->define(Notification::class, function (Faker $faker) {
    return [
        'title' => $faker->realText($maxNbChars = 15),
        'body' => $faker->realText($maxNbChars = 50),
        'author_id' => $faker->randomDigitNotNull,
    ];
});
