<?php

use App\Model\AdminVideoImage;
use Carbon\Carbon;
use Faker\Generator as Faker;


$factory->define(AdminVideoImage::class, function (Faker $faker) {
    return [
        'admin_video_id' => null,
        'image' => 'https://www.fillmurray.com/200/300',
        'is_default' => 0,
        'position' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
