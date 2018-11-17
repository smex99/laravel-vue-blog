<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' => App\User::all()->random()->id,
        'title' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'description' => $faker->text($maxNbChars = 1500),
        'content' => $faker->text($maxNbChars = 500),
        'live' => $faker->boolean(),
        'image' => $faker->imageUrl( $width = 400, 400),
    ];
});
