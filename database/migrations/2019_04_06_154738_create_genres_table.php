<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenresTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unique_id');
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->string('name');
            $table->string('video');
            $table->string('subtitle');
            $table->string('image');
            $table->integer('position');
            $table->integer('status');
            $table->integer('is_approved');
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
        Schema::drop('genres');
    }

}
