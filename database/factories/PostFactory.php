<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use \Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence(5);
    return [
        'title' => $title,
        'description' => $faker->text(5000),
        'slug' => Str::slug(date('Ymd') . '-' . substr($title, 0, 22), '-'),
        'user_id' => App\User::class
    ];
});
