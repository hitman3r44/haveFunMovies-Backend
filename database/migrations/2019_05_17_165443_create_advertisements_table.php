<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');

            $table->integer('min_play_time')->nullable();
            $table->integer('max_play_time')->nullable();
            $table->integer('already_played_time')->nullable();
            $table->date('start_playing_date')->nullable();
            $table->date('end_playing_date')->nullable();
            $table->date('uploaded_at');

            $table->integer('created_by');

            $table->float('total_amount');
            $table->float('per_view_cost');

            $table->boolean('is_published')->default(false);
            $table->boolean('is_deleted')->default(false);;
            $table->boolean('is_expired')->default(false);;

            $table->integer('status');
            $table->string('description')->nullable();

            $table->timestamps();
        });

        Schema::create('adds_has_movies', function (Blueprint $table) {
            $table->unsignedInteger('advertisement_id');
            $table->unsignedBigInteger('movie_id');

            $table->index('advertisement_id');

            $table->foreign('movie_id')
                ->references('id')
                ->on('admin_videos')
                ->onDelete('cascade');

            $table->primary(['advertisement_id', 'movie_id'],
                'adds_has_movies');
        });

        Schema::create('adds_has_countries', function (Blueprint $table) {
            $table->unsignedInteger('advertisement_id');
            $table->unsignedBigInteger('country_id');

            $table->index('advertisement_id');

            $table->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('cascade');

            $table->primary(['advertisement_id', 'country_id'],
                'adds_has_countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisements');
    }
}
