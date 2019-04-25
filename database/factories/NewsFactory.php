<?php

use  App\News;
use App\Category;
use Faker\Generator as Faker;


$factory->define(News::class, function (Faker $faker) {
    return [
        'category_id' => function() {
           return factory(Category::class)->create()->id;
        },
        'title' => $faker->sentence,
        'body'  => $faker->paragraph,
    ];
});