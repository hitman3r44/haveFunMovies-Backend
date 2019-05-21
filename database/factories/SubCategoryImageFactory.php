<?php

use App\Model\SubCategoryImage;
use Carbon\Carbon;
use Faker\Generator as Faker;


$factory->define(SubCategoryImage::class, function (Faker $faker) {
    return [
        'sub_category_id' => null,
        'picture' => 'http://lorempixel.com/400/200/business/'.$faker->numberBetween($min = 1, $max = 10),
        'position' => 1 ,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
