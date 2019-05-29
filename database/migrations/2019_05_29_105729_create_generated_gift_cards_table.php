<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneratedGiftCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generated_gift_cards', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('gift_card_id')->unsigned();
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
        Schema::dropIfExists('generated_gift_cards');
    }
}
