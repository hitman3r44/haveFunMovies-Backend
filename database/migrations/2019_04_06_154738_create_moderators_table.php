<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModeratorsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moderators', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email', 255)->unique();
            $table->string('password');
            $table->string('token');
            $table->string('token_expiry');
            $table->string('picture');
            $table->string('description');
            $table->integer('is_activated');
            $table->integer('is_user');
            $table->enum('gender', array('male', 'female', 'others'));
            $table->string('mobile');
            $table->string('paypal_email');
            $table->string('address');
            $table->string('remember_token', 100)->nullable();
            $table->string('timezone');
            $table->float('total');
            $table->float('total_admin_amount');
            $table->float('total_user_amount');
            $table->float('paid_amount');
            $table->float('remaining_amount');
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
        Schema::drop('moderators');
    }

}
