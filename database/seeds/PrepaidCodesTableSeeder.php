<?php

use Illuminate\Database\Seeder;

class PrepaidCodesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('prepaid_codes')->delete();
        
        \DB::table('prepaid_codes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => '13 DOLLAR',
                'price' => '11.00',
                'is_used' => 0,
                'is_paid' => 0,
                'created_by' => 2,
                'updated_by' => 2,
                'deleted_at' => NULL,
                'created_at' => '2019-05-28 18:45:47',
                'updated_at' => '2019-05-28 18:45:47',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => '25 DOLLAR',
                'price' => '23.99',
                'is_used' => 0,
                'is_paid' => 0,
                'created_by' => 2,
                'updated_by' => 2,
                'deleted_at' => NULL,
                'created_at' => '2019-05-29 10:20:07',
                'updated_at' => '2019-05-29 10:20:07',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => '50 DOLLAR',
                'price' => '45.99',
                'is_used' => 0,
                'is_paid' => 0,
                'created_by' => 2,
                'updated_by' => 2,
                'deleted_at' => NULL,
                'created_at' => '2019-05-29 10:21:05',
                'updated_at' => '2019-05-29 10:21:05',
            ),
        ));
        
        
    }
}