<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTmdbGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tmdb_genres', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tmdb_genre_id')->nullable();
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('status')->default(0);

            $table->softDeletes();
            $table->integer('created_by')->default(2);
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('tmdb_genres');
    }
}
