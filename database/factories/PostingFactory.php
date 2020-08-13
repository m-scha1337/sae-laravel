<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Posting;
use Faker\Generator as Faker;

$factory->define(Posting::class, function (Faker $faker) {

    $time = $faker->dateTimeBetween('-1 year', 'yesterday');

    return [

        'title' => $faker->catchPhrase,
        'text' => $faker->optional()->sentence,
        'like_count' => $faker->numberBetween(0,9999),
        'dislike_count' => $faker->numberBetween(0,999),
        'is_featured' => $faker->boolean(10),
        'created_at' => $time,
        'updated_at' => $time,
    ];
});

// https://github.com/fzaninotto/Faker
