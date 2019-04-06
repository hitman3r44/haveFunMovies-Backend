<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTracksTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_tracks', function (Blueprint $table) {
            $table->increments('id');
            $table->text('ip_address');
            $table->text('HTTP_USER_AGENT');
            $table->text('REQUEST_TIME');
            $table->text('REMOTE_ADDR');
            $table->text('hostname');
            $table->float('latitude', 10, 8);
            $table->float('longitude', 10, 8);
            $table->text('origin');
            $table->string('city');
            $table->string('region');
            $table->string('country');
            $table->string('others');
            $table->integer('view');
            $table->integer('status');
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
        Schema::drop('user_tracks');
    }

}
