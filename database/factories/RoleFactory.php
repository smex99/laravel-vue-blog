<?php

use Faker\Generator as Faker;

$factory->define(App\Role::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 1, $variableNbWords = true),
        'description' => $faker->sentence($nbWords = 3, $variableNbWords = true),
    ];
});
