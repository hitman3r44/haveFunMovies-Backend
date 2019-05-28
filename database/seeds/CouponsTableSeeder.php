<?php

use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('coupons')->delete();
        
        \DB::table('coupons')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => '50% Off',
                'coupon_code' => 'OFF50',
                'amount_type' => '0',
                'amount' => 50.0,
                'expiry_date' => '2019-05-30',
                'description' => NULL,
                'status' => 1,
                'created_by' => 2,
                'updated_by' => 2,
                'deleted_at' => NULL,
                'created_at' => '2019-05-28 09:00:33',
                'updated_at' => '2019-05-28 09:00:33',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'One Dollar Off',
                'coupon_code' => 'DOLLARSTORE',
                'amount_type' => '1',
                'amount' => 1.0,
                'expiry_date' => '2019-05-30',
                'description' => NULL,
                'status' => 0,
                'created_by' => 2,
                'updated_by' => 2,
                'deleted_at' => NULL,
                'created_at' => '2019-05-28 09:04:28',
                'updated_at' => '2019-05-28 09:06:45',
            ),
        ));
        
        
    }
}