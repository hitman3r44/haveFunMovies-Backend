<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email', 255)->unique();
            $table->string('password');
            $table->string('picture');
            $table->string('description');
            $table->integer('is_activated');
            $table->enum('gender', array('male', 'female', 'others'));
            $table->string('mobile');
            $table->string('paypal_email');
            $table->string('address');
            $table->string('token');
            $table->string('token_expiry');
            $table->string('remember_token', 100)->nullable();
            $table->string('timezone');
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
        Schema::drop('admins');
    }

}
