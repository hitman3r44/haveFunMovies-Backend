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
            $table->string('picture')->nullable();
            $table->string('token');
            $table->string('token_expiry');
            $table->string('device_token')->nullable();
            $table->enum('device_type', array('android', 'ios', 'web'));
            $table->enum('login_by', array('manual', 'facebook', 'twitter', 'google', 'linkedin'));
            $table->string('social_unique_id')->nullable();
            $table->string('fb_lg')->nullable();
            $table->string('gl_lg')->nullable();
            $table->string('description')->nullable();
            $table->integer('is_activated');
            $table->integer('status');
            $table->boolean('email_notification')->default(1);
            $table->integer('no_of_account');
            $table->integer('logged_in_account')->nullable();
            $table->string('card_id')->nullable();
            $table->string('payment_mode')->nullable();
            $table->string('verification_code')->nullable();
            $table->string('verification_code_expiry')->nullable();
            $table->string('is_verified')->nullable();
            $table->integer('push_status')->nullable();
            $table->integer('user_type')->default(1);
            $table->string('user_type_change_by')->nullable();
            $table->integer('is_moderator')->nullable();
            $table->integer('moderator_id')->nullable();
            $table->enum('gender', array('male', 'female', 'others'))->nullable();
            $table->string('mobile');
            $table->float('latitude', 15, 8)->nullable();
            $table->float('longitude', 15, 8)->nullable();
            $table->string('paypal_email')->nullable();
            $table->string('address')->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->string('timezone');
            $table->float('amount_paid')->nullable();
            $table->dateTime('expiry_date')->nullable();
            $table->integer('no_of_days')->nullable();
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
