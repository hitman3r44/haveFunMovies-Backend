<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert($this->getUserData());
    }


    private function getUserData()
    {
        return [
            [
                'name' => 'User',
                'email' => 'user@havefunmovies.com',
                'password' => '$2y$10$Mush1is5LbCNUtBfSd1N6OY1kY5DgcjnZfM6uEJEDYKQXc4qivOhG',
                'picture' => 'http://adminview.streamhash.com/placeholder.png',
                'token' => '2y103gI7f5tk4o1peCGWzx6Q604yx0xu8kPf1WdSgxZkCnMGAOSsmWaW',
                'token_expiry' => '1550787727',
                'device_token' => '123456',
                'device_type' => 'web',
                'login_by' => 'manual',
                'social_unique_id' => '',
                'fb_lg' => '',
                'gl_lg' => '',
                'description' => '',
                'is_activated' => 1,
                'status' => 1,
                'email_notification' => 1,
                'no_of_account' => 1,
                'logged_in_account' => 1,
                'card_id' => '',
                'payment_mode' => '',
                'verification_code' => '',
                'verification_code_expiry' => '',
                'is_verified' => '1',
                'push_status' => 0,
                'user_type' => 1,
                'user_type_change_by' => '',
                'is_moderator' => 0,
                'moderator_id' => 0,
                'gender' => 'male',
                'mobile' => '',
                'latitude' => 0,
                'longitude' => 0,
                'paypal_email' => '',
                'address' => '',
                'remember_token' => NULL,
                'timezone' => '',
                'amount_paid' => 0,
                'expiry_date' => NULL,
                'no_of_days' => 0,
                'one_time_subscription' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Test',
                'email' => 'test@gavefunmovies.com',
                'password' => '$2y$10$3lXNGwoYVCeFDOJEVrxBbOZDdXKeRJX3tilFaaRuT8KAVFtIkTtL6',
                'picture' => 'http://adminview.streamhash.com/placeholder.png',
                'token' => '2y10qLbSkXUiOMirj08xa48psubBoVg6lKIoRk5vEASIgDpsgCpRUUm',
                'token_expiry' => '1545153883',
                'device_token' => '',
                'device_type' => 'web',
                'login_by' => 'manual',
                'social_unique_id' => '',
                'fb_lg' => '',
                'gl_lg' => '',
                'description' => '',
                'is_activated' => 1,
                'status' => 1,
                'email_notification' => 1,
                'no_of_account' => 0,
                'logged_in_account' => 0,
                'card_id' => '',
                'payment_mode' => '',
                'verification_code' => '',
                'verification_code_expiry' => '',
                'is_verified' => '1',
                'push_status' => 0,
                'user_type' => 1,
                'user_type_change_by' => '',
                'is_moderator' => 0,
                'moderator_id' => 0,
                'gender' => 'male',
                'mobile' => '',
                'latitude' => 0,
                'longitude' => 0,
                'paypal_email' => '',
                'address' => '',
                'remember_token' => NULL,
                'timezone' => '',
                'amount_paid' => 0,
                'expiry_date' => NULL,
                'no_of_days' => 0,
                'one_time_subscription' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
    }
}
