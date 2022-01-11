<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->string('shop_name')->nullable();
            $table->integer('NID')->nullable()->comment('National ID card number');
            $table->integer('BIN')->nullable()->comment('Business Identification number');
            $table->string('bank_name')->nullable();
            $table->string('bank_br_name')->nullable();
            $table->string('bank_acc_name')->nullable();
            $table->bigInteger('bank_acc_no')->nullable();
            $table->string('address')->nullable();
            $table->string('website_link')->nullable();

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
        Schema::dropIfExists('merchants');
    }
}
