<?php

use Illuminate\Database\Seeder;

class SubscriptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('subscriptions')->delete();
        
        \DB::table('subscriptions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'unique_id' => '24-Hours5cecf26a300ac',
                'title' => '24 Hours',
                'description' => '24 Hours',
                'subscription_type' => 'days',
                'plan' => '1',
                'amount' => 2.99,
                'total_subscription' => 0,
                'status' => 1,
                'popular_status' => 0,
                'created_by' => 1,
                'created_at' => '2019-05-28 08:33:46',
                'updated_at' => '2019-05-28 08:46:17',
            ),
            1 => 
            array (
                'id' => 2,
                'unique_id' => '48-Hours5cecf47e93295',
                'title' => '48 Hours',
                'description' => '48 Hours',
                'subscription_type' => 'days',
                'plan' => '2',
                'amount' => 3.99,
                'total_subscription' => 0,
                'status' => 1,
                'popular_status' => 0,
                'created_by' => 1,
                'created_at' => '2019-05-28 08:42:38',
                'updated_at' => '2019-05-28 08:42:38',
            ),
            2 => 
            array (
                'id' => 3,
                'unique_id' => '72-Hours5cecf51a08647',
                'title' => '72 Hours',
                'description' => '72 Hours',
                'subscription_type' => 'days',
                'plan' => '3',
                'amount' => 4.99,
                'total_subscription' => 0,
                'status' => 1,
                'popular_status' => 0,
                'created_by' => 1,
                'created_at' => '2019-05-28 08:45:14',
                'updated_at' => '2019-05-28 08:45:14',
            ),
            3 => 
            array (
                'id' => 4,
                'unique_id' => 'Monthly-Plan5cecf55983f6a',
                'title' => 'Monthly Plan',
                'description' => 'Monthly Plan',
                'subscription_type' => 'days',
                'plan' => '30',
                'amount' => 9.99,
                'total_subscription' => 0,
                'status' => 1,
                'popular_status' => 1,
                'created_by' => 1,
                'created_at' => '2019-05-28 08:46:17',
                'updated_at' => '2019-05-28 08:46:17',
            ),
        ));
        
        
    }
}