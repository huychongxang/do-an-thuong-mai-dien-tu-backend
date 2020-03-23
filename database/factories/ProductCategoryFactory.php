<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\ProductCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->realText(100),
        'parent_id' => 1,
        'status' => 1,
    ];
});
