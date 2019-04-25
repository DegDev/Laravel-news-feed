<?php


use Faker\Generator as Faker;

$factory->define('App\Category', function (Faker $faker) {

    $name = $faker->unique()->word();

    return [
        'name' => $name,
        'slug' => $name
    ];
});
