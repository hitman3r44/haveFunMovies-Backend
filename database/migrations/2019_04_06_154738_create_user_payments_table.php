<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPaymentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subscription_id');
            $table->integer('user_id');
            $table->string('payment_id');
            $table->float('subscription_amount');
            $table->string('coupon_code');
            $table->string('coupon_amount');
            $table->float('amount');
            $table->string('payment_mode', 8);
            $table->dateTime('expiry_date');
            $table->integer('status');
            $table->integer('from_auto_renewed');
            $table->string('reason_auto_renewal_cancel');
            $table->integer('is_cancelled');
            $table->boolean('is_coupon_applied');
            $table->text('coupon_reason');
            $table->text('reason');
            $table->text('cancel_reason');
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
        Schema::drop('user_payments');
    }

}
