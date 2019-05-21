<?php

use App\Model\Country;
use Illuminate\Database\Seeder;
use Triasrahman\JSONSeeder\JSONSeeder;

class CountriesTableSeeder extends Seeder
{
    use JSONSeeder;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->JSONSeed('countries', Country::class);
    }
}
