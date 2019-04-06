<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email', 255)->unique();
            $table->string('password');
            $table->string('picture');
            $table->string('token');
            $table->string('token_expiry');
            $table->string('device_token');
            $table->enum('device_type', array('android', 'ios', 'web'));
            $table->enum('login_by', array('manual', 'facebook', 'twitter', 'google', 'linkedin'));
            $table->string('social_unique_id');
            $table->string('fb_lg');
            $table->string('gl_lg');
            $table->string('description');
            $table->integer('is_activated');
            $table->integer('status');
            $table->boolean('email_notification')->default(1);
            $table->integer('no_of_account');
            $table->integer('logged_in_account');
            $table->string('card_id');
            $table->string('payment_mode');
            $table->string('verification_code');
            $table->string('verification_code_expiry');
            $table->string('is_verified');
            $table->integer('push_status');
            $table->integer('user_type');
            $table->string('user_type_change_by');
            $table->integer('is_moderator');
            $table->integer('moderator_id');
            $table->enum('gender', array('male', 'female', 'others'));
            $table->string('mobile');
            $table->float('latitude', 15, 8);
            $table->float('longitude', 15, 8);
            $table->string('paypal_email');
            $table->string('address');
            $table->string('remember_token', 100)->nullable();
            $table->string('timezone');
            $table->float('amount_paid');
            $table->dateTime('expiry_date')->nullable();
            $table->integer('no_of_days');
            $table->integer('one_time_subscription')->default(0)->comment('0 - Not Subscribed , 1 - Subscribed');
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
        Schema::drop('users');
    }

}
