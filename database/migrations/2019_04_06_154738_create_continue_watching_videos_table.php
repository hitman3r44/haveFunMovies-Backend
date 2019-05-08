<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContinueWatchingVideosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('continue_watching_videos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('sub_profile_id');
            $table->integer('admin_video_id');
            $table->string('duration', 8);
            $table->boolean('is_genre');
            $table->smallInteger('position');
            $table->boolean('genre_position');
            $table->boolean('status');
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
        Schema::drop('continue_watching_videos');
    }

}
