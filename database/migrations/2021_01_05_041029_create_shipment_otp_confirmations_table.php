<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentOtpConfirmationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipment_otp_confirmations', function (Blueprint $table) {
            $table->id();
            $table->string('otp');
            $table->string('collected_by');
            $table->unsignedBigInteger('shipment_id');
            $table->unsignedBigInteger('courier_id');
            
            $table->foreign('shipment_id')->references('id')->on('shipments');
            $table->foreign('courier_id')->references('id')->on('couriers');
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
        Schema::dropIfExists('shipment_otp_confirmations');
    }
}
