<?php

use Faker\Generator as Faker;

$factory->define(App\Blog::class, function (Faker $faker) {
    return [
        'bloggerId' => rand(1,5),
        'title' => $faker->sentence,
        'blogDescription' => $faker->paragraph     
    ];
});

