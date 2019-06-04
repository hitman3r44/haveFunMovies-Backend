<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCastCrewsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cast_crews', function (Blueprint $table) {
            $table->increments('id');

            $table->string('unique_id');
            $table->string('name', 128);
            $table->string('image');
            $table->text('description');
            $table->boolean('status');
            $table->boolean('cast_and_crew_type_id');

            $table->integer('created_by');
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
        Schema::drop('cast_crews');
    }

}
