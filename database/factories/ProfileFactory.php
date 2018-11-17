<?php

use Faker\Generator as Faker;

$factory->define(App\Profile::class, function (Faker $faker) {
    return [
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'city' => $faker->city,
        'country' => $faker->country,
        'postal_code' => $faker->countryCode,
        'image' => 'avatar.png',
        /* 'image' => $faker->imageUrl( $width = 640, 480), */
    ];
});
