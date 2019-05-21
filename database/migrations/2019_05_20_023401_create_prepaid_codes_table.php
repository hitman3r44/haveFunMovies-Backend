<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrepaidCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prepaid_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable();
            $table->decimal('price')->nullable();
            $table->tinyInteger('is_used')->default(0);
            $table->tinyInteger('is_paid')->default(0);
            $table->integer('created_by');
            $table->integer('updated_by');
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
        Schema::drop('prepaid_codes');
    }
}
