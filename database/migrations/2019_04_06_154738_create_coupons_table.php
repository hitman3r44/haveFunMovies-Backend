<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('coupon_code', 255)->unique();
            $table->string('amount_type');
            $table->float('amount');
            $table->date('expiry_date');
            $table->string('description');
            $table->integer('status');
            $table->smallInteger('no_of_users_limit');
            $table->boolean('per_users_limit');
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
        Schema::drop('coupons');
    }

}
