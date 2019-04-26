<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{


    public function run()
    {
        DB::table('admins')->delete();
        DB::table('admins')->insert($this->getAdminData());
    }


    private function getAdminData()
    {
        return [
            [
                'name' => 'Admin',
                'email' => 'admin@havefunmovies.com',
                'password' => '$2y$10$/AIImUUtykg/QotsMRiMg.0vmUPhgGfiWzJjTNcdsPxq8UaSTSO/6',
                'picture' => 'http://adminview.streamhash.com/placeholder.png',
                'description' => '',
                'is_activated' => 0,
                'gender' => 'male',
                'mobile' => '',
                'paypal_email' => '',
                'address' => '',
                'token' => '2y10B5KqBBtnoZriNOVyntMgFeJBOVQZ6EfPAHMoBRspih5CeTygdJW',
                'token_expiry' => '1552928872',
                'remember_token' => NULL,
                'timezone' => 'Asia/Dhaka',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Test',
                'email' => 'test@havefunmovies.com',
                'password' => '$2y$10$GkZURcRtu7GM0JtwAxJF.O/i/D9bzKWkwtAQYj/D.oXXUrVuCpL6q',
                'picture' => 'http://adminview.streamhash.com/placeholder.png',
                'description' => '',
                'is_activated' => 0,
                'gender' => 'male',
                'mobile' => '',
                'paypal_email' => '',
                'address' => '',
                'token' => '',
                'token_expiry' => '',
                'remember_token' => NULL,
                'timezone' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
    }
}
