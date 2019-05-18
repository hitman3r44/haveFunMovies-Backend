<?php

use App\Model\Category;
use Carbon\Carbon;
use Faker\Generator as Faker;


$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'picture' => $faker->imageUrl($width = 250, $height = 250),
        'is_series' => 0,
        'status' => 1,
        'is_approved' => 1,
        'created_by' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
