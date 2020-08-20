<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {

    $time = $faker->dateTimeBetween('-1 year', 'yesterday');

    return [

        'name' => $faker->catchPhrase,
        'created_at' => $time,
        'updated_at' => $time,
    ];
});
