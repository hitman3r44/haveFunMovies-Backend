<?php

use Illuminate\Database\Seeder;

class GiftCardsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('gift_cards')->delete();
        
        \DB::table('gift_cards')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => '50$ Gift Card',
                'price' => '50.00',
                'is_used' => 0,
                'is_paid' => 0,
                'created_by' => 2,
                'updated_by' => 2,
                'deleted_at' => NULL,
                'created_at' => '2019-05-29 10:32:29',
                'updated_at' => '2019-05-29 10:32:29',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => '30$ Gift Card',
                'price' => '30.00',
                'is_used' => 0,
                'is_paid' => 0,
                'created_by' => 2,
                'updated_by' => 2,
                'deleted_at' => NULL,
                'created_at' => '2019-05-29 10:32:55',
                'updated_at' => '2019-05-29 10:32:55',
            ),
            2 => 
            array (
                'id' => 3,
                'code' => '20$ Gift Card',
                'price' => '20.00',
                'is_used' => 0,
                'is_paid' => 0,
                'created_by' => 2,
                'updated_by' => 2,
                'deleted_at' => NULL,
                'created_at' => '2019-05-29 10:33:16',
                'updated_at' => '2019-05-29 10:33:16',
            ),
        ));
        
        
    }
}