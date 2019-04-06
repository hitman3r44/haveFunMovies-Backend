<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayPerViewsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_per_views', function (Blueprint $table) {
            $table->increments('id')->comment('Primary Key, It is an unique key');
            $table->integer('user_id')->unsigned()->comment('User table Primary key given as Foreign Key');
            $table->integer('video_id')->unsigned()->comment('Admin Video table Primary key given as Foreign Key');
            $table->string('payment_id');
            $table->float('ppv_amount');
            $table->float('amount');
            $table->string('payment_mode', 8);
            $table->float('admin_amount');
            $table->float('moderator_amount');
            $table->string('type_of_subscription');
            $table->string('type_of_user');
            $table->dateTime('expiry_date');
            $table->boolean('is_coupon_applied');
            $table->text('coupon_reason');
            $table->boolean('is_watched');
            $table->date('paid_date');
            $table->smallInteger('status')->default(0)->comment('Status of the per_per_view table');
            $table->text('reason');
            $table->timestamps();
            $table->string('currency');
            $table->string('coupon_code');
            $table->float('coupon_amount');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pay_per_views');
    }

}
