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

            $table->float('total_amount');
            $table->float('per_view_cost');

            $table->boolean('is_published')->default(false);
            $table->boolean('is_deleted')->default(false);;
            $table->boolean('is_expired')->default(false);;

            $table->integer('status');
            $table->string('video');
            $table->string('description')->nullable();

            $table->softDeletes();
            $table->integer('created_by');
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
        Schema::dropIfExists('advertisements');
    }
}
