<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\ProductCategory::class, function (Faker $faker) {
    $root = \App\Models\ProductCategory::where('slug', 'root')->first();
    return [
        'name' => $faker->name,
        'description' => $faker->realText(100),
        'parent_id' => $root->id,
        'status' => 1,
    ];
});
