<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddvertisementHasCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisement_has_countries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('advertisement_id');
            $table->unsignedInteger('country_id');

            $table->index('advertisement_id');
            $table->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('cascade');

            $table->primary(['advertisement_id', 'country_id'],
                'adds_has_countries');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addvertisement_has_countries');
    }
}
