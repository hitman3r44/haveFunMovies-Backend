<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedeemRequestsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redeem_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('moderator_id');
            $table->float('request_amount');
            $table->float('paid_amount');
            $table->string('payment_id');
            $table->float('admin_paid_amount')->comment('Temporary Column');
            $table->integer('status');
            $table->timestamps();
            $table->string('payment_mode');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('redeem_requests');
    }

}
