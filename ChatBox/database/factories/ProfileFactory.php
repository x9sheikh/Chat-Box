<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'user_id' => $faker->unique()->numberBetween($min = 203, $max = 402),
        'city' => $faker->city(),
        'country' => $faker->country(),
        'picture' => "unknown.jpg",
        'date_of_birth' => $faker->dateTime($max = 'now', $timezone = null),
    ];
});
