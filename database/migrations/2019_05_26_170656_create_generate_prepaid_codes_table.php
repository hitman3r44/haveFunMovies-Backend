<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneratePrepaidCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generate_prepaid_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prepaid_plan_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->integer('sold_by')->unsigned();
            $table->string('UUID');
            $table->tinyInteger('is_paid')->default(0);
            $table->tinyInteger('is_deleted')->default(0);
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned();
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
        Schema::drop('generate_prepaid_codes');
    }
}
