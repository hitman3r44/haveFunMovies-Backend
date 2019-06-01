<?php

use App\Model\AdminVideo;
use Carbon\Carbon;
use Faker\Generator as Faker;


$factory->define(AdminVideo::class, function (Faker $faker) {
    return [
        'unique_id' => uniqid(),
        'title' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'description' => $faker->sentence($nbWords = 9, $variableNbWords = true),
        'age' => $faker->numberBetween($min = 13, $max = 45),
        'details' => $faker->sentence($nbWords = 9, $variableNbWords = true),
        'category_id' => 1,
        'sub_category_id' => 1,
        'genre_id' => 0,
        'video' => 'https://sample-videos.com/video123/mp4/480/big_buck_bunny_480p_30mb.mp4',
        'trailer_video' => 'https://sample-videos.com/video123/mp4/480/big_buck_bunny_480p_5mb.mp4',
        'video_subtitle' => '',
        'trailer_subtitle' =>  '',
        'default_image' => 'https://sample-videos.com/img/Sample-jpg-image-200kb.jpg',
        'video_gif_image' => '',
        'video_image_mobile' => '',
        'banner_image' => 'https://sample-videos.com/img/Sample-jpg-image-200kb.jpg',
        'ratings' => $faker->numberBetween($min = 1, $max = 4),
        'reviews' => $faker->sentence($nbWords = 5, $variableNbWords = true),
        'status' => $faker->numberBetween($min = 0, $max = 1),
        'is_approved' => $faker->numberBetween($min = 0, $max = 1),
        'is_home_slider' => 0,
        'is_banner' => $faker->numberBetween($min = 0, $max = 1),
        'uploaded_by' => $faker->numberBetween($min = 0, $max = 1),
        'publish_time' => date('Y-m-d'),
        'duration' => $faker->time($format = 'H:i:s', $max = 'now'),
        'trailer_duration' => $faker->time($format = 'H:i:s', $max = 'now'),
        'video_resolutions' => null,
        'trailer_video_resolutions' => null,
        'compress_status' => 0,
        'main_video_compress_status' => 0,
        'trailer_compress_status' => 0,
        'video_resize_path' => null,
        'trailer_resize_path' => null,
        'edited_by' => 'admin',
        'ppv_created_by' => '1',
        'watch_count' =>  $faker->numberBetween($min = 0, $max = 5),
        'is_pay_per_view' =>  0,
        'type_of_user' =>  0,
        'type_of_subscription' =>  0,
        'amount' =>  $faker->numberBetween($min = 25, $max = 55),
        'redeem_amount' =>  1.25,
        'admin_amount' =>  2.25,
        'user_amount' =>  3.25,
        'video_type' =>  1,
        'video_upload_type' =>  1,
        'position' =>  1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
