<?php

use Illuminate\Database\Seeder;

class CastAndCrewTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cast_and_crew_types')->delete();
        
        \DB::table('cast_and_crew_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Actor',
                'description' => 'Actor',
                'is_deleted' => 0,
                'created_by' => 2,
                'updated_by' => 2,
                'created_at' => '2019-05-29 10:32:29',
                'updated_at' => '2019-05-29 10:32:29',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Director',
                'description' => 'Director',
                'is_deleted' => 0,
                'created_by' => 2,
                'updated_by' => 2,
                'created_at' => '2019-05-29 10:32:29',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}