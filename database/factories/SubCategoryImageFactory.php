<?php

use App\Model\SubCategoryImage;
use Carbon\Carbon;
use Faker\Generator as Faker;


$factory->define(SubCategoryImage::class, function (Faker $faker) {
    return [
        'sub_category_id' => null,
        'picture' => $faker->imageUrl($width = 250, $height = 250),
        'position' => 1 ,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
