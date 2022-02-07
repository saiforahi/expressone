<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentOTPSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipment_o_t_p_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shipment_id');
            $table->unsignedBigInteger('courier_id')->nullable();
            $table->string('otp')->nullable();
            $table->string('message')->nullable();
            $table->string('sent_to_phone_number')->nullable();
            $table->enum('sent_to',['merchant','recipient','courier'])->nullable();
            $table->boolean('confirmed')->nullable();
            $table->nullableMorphs('collect_by');
            
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
        Schema::dropIfExists('shipment_o_t_p_s');
    }
}
