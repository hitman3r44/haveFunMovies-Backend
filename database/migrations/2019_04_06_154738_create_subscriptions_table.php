<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unique_id');
            $table->string('title');
            $table->text('description');
            $table->string('subscription_type')->comment('month,year,days');
            $table->string('plan');
            $table->float('amount');
            $table->integer('total_subscription');
            $table->integer('status');
            $table->integer('popular_status')->default(0);
            $table->integer('no_of_account')->default(1);
            $table->softDeletes();
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
        Schema::drop('subscriptions');
    }

}
