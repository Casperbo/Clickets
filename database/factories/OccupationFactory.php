<?php

use Faker\Generator as Faker;

$factory->define(App\Occupation::class, function (Faker $faker) {

    $data = [
        'occupationName' => $faker->title
    ];

    return $data;
});