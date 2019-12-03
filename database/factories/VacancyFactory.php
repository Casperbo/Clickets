<?php

use Faker\Generator as Faker;

$factory->define(App\Vacancy::class, function (Faker $faker) {
    $data = [
        'title' => $faker->title,
        'occupation_id' => rand(1, 3),
        'description' => $faker->title
    ];

    return $data;
});
