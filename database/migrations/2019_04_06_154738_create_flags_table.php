<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlagsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flags', function (Blueprint $table) {
            $table->increments('id')->comment('Primary Key, It is an unique key');
            $table->integer('user_id')->unsigned();
            $table->integer('sub_profile_id');
            $table->integer('video_id')->unsigned();
            $table->text('reason')->nullable()->comment('Reason for flagging the video');
            $table->smallInteger('status')->default(0)->comment('Status of the flag table');
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
        Schema::drop('flags');
    }

}
