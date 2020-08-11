<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Posting;
use Faker\Generator as Faker;

$factory->define(Posting::class, function (Faker $faker) {

    return [

        'title' => $faker->catchPhrase,
        'text' => $faker->optional()->sentence,
        'like_count' => $faker->numberBetween(0,9999),
        'is_featured' => $faker->boolean(10),
    ];
});

// https://github.com/fzaninotto/Faker
