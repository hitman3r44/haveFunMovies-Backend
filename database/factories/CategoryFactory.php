<?php

use App\Model\Category;
use Carbon\Carbon;
use Faker\Generator as Faker;


$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'picture' => 'http://lorempixel.com/400/200/technics/'.$faker->numberBetween($min = 1, $max = 10),
        'is_series' => 0,
        'status' => 1,
        'is_approved' => 1,
        'created_by' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
