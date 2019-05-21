<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Advertisement;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Advertisement::class, function (Faker $faker) {
    return [

        'title' => ucwords($faker->sentence($nbWords = 3, $variableNbWords = true)),
        'min_play_time' => $faker->numberBetween($min = 1, $max = 2),
        'max_play_time' => $faker->numberBetween($min = 3, $max = 5),
        'already_played_time' => $faker->numberBetween($min = 0, $max = 12),
        'start_playing_date' => Carbon::createFromTimeStamp($faker->dateTimeBetween('-30 days', '+30 days')->getTimestamp()),
        'end_playing_date' => Carbon::createFromFormat('Y-m-d H:i:s', now())->addday(20),
        'uploaded_at' => Carbon::now(),
        'created_by' => 1,
        'total_amount' => $faker->numberBetween($min = 120, $max = 160),
        'per_view_cost' => $faker->numberBetween($min = 1, $max = 17),
        'video' => 'https://sample-videos.com/video123/mp4/480/big_buck_bunny_480p_30mb.mp4',
        'is_published' => true,
        'is_deleted' => false,
        'is_expired' => false,
        'status' => 1,
        'description' => $faker->sentence($nbWords = 9, $variableNbWords = true),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
