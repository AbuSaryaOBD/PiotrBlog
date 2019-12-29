<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BlogPost;
use Faker\Generator as Faker;

$factory->define(BlogPost::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(10),
        'content' => $faker->paragraphs(2, true),
    ];
});

$factory->state(BlogPost::class, 'new-title', function (Faker $faker) {
    return [
        'title' => 'New title from test',
        // 'content' => 'Content of Post from test',
    ];
});