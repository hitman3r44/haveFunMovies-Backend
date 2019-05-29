<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 4,
                'name' => 'Movie',
                'picture' => 'http://localhost/uploads/images/SV-2019-05-28-07-47-23-2998d3aa255b54e3e0d97c4fb194ec2cbd751606.jpeg',
                'is_series' => 0,
                'status' => '1',
                'is_approved' => 1,
                'created_by' => 1,
                'created_at' => '2019-05-28 07:47:23',
                'updated_at' => '2019-05-28 07:47:23',
            ),
            1 => 
            array (
                'id' => 5,
                'name' => 'Documentary',
                'picture' => 'http://localhost/uploads/images/SV-2019-05-28-07-47-56-5c7c80128e9580193125010eca63467174a19de4.png',
                'is_series' => 0,
                'status' => '1',
                'is_approved' => 1,
                'created_by' => 1,
                'created_at' => '2019-05-28 07:47:56',
                'updated_at' => '2019-05-28 07:47:56',
            ),
        ));
        
        
    }
}