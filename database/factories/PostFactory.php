<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'cat_id'        => rand(1, 10),
        'user_id'       => rand(1,10),
        'title'         => $faker->sentence,
        'description'   => $faker->paragraph(),
        'photo'         => $faker->imageUrl()
    ];
});
