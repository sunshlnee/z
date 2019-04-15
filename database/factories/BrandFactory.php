<?php

use App\Models\Product\Brand;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->company,
        'slug' => $faker->unique()->slug(2),
    ];
});
