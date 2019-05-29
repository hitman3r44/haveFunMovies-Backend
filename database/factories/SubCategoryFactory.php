<?php

use App\Model\SubCategory;
use Carbon\Carbon;
use Faker\Generator as Faker;


$factory->define(SubCategory::class, function (Faker $faker) {
    return [

        'category_id' => null,
        'name' => $faker->name,
        'description' => $faker->sentence($nbWords = 8, $variableNbWords = true) ,
        'status' => 1,
        'is_approved' => 1,
        'created_by' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
