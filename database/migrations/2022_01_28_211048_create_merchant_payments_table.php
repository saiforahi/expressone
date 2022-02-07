<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shipment_id');
            $table->unsignedBigInteger('merchant_id');
            $table->nullableMorphs('paid_by');
            $table->float('amount',8,2)->comment('amount paid');
            $table->boolean('collected_by_merchant')->default(false);
            
            $table->foreign('shipment_id')->references('id')->on('shipments');
            $table->foreign('merchant_id')->references('id')->on('users');
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
        Schema::dropIfExists('merchant_payments');
    }
}
