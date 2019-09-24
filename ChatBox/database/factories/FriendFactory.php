<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Friend;
use Faker\Generator as Faker;

$factory->define(Friend::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 0, $max = 1),
        'friend_id' => $faker->unique()->numberBetween($min = 203, $max = 402)
    ];
});
