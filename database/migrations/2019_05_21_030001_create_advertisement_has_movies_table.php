<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddvertisementHasMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisement_has_movies', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('advertisement_id');
            $table->unsignedBigInteger('movie_id');

            $table->index('advertisement_id');
            $table->foreign('movie_id')
                ->references('id')
                ->on('admin_videos')
                ->onDelete('cascade');

            $table->primary(['advertisement_id', 'movie_id'],
                'adds_has_movies');
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
        Schema::dropIfExists('addvertisement_has_movies');
    }
}
