<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModeratorTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('moderators')->delete();
        DB::table('moderators')->insert($this->getModeratorsData());
    }


    private function getModeratorsData()
    {
        return [
            [
                'name' => 'Moderator',
                'email' => 'moderator@havefunmovies.com',
                'password' => '$2y$10$OTaCczW9Y8/2TsWA6mHeU.Oj/mhTwz9yLezkh4V7PKUowXNwuORSW',
                'token' => '2y10uc5K476dvJjwoHK5PhDu9xNHuaKySMPyHQTxiexJiELTeAL59O',
                'token_expiry' => '1545153884',
                'picture' => 'http://adminview.streamhash.com/placeholder.png',
                'description' => '',
                'is_activated' => 1,
                'is_user' => 0,
                'gender' => 'male',
                'mobile' => '',
                'paypal_email' => '',
                'address' => '',
                'remember_token' => NULL,
                'timezone' => '',
                'total' => 0,
                'total_admin_amount' => 0,
                'total_user_amount' => 0,
                'paid_amount' => 0,
                'remaining_amount' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
    }
}
