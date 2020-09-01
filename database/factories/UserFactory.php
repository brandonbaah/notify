<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'email' => $faker->unique()->companyEmail,
        'password' => $faker->password,
        'email_verified_at' => date('Y-m-d H:i:s')
    ];
});
