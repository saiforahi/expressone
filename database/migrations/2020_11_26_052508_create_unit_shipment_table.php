<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitShipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_shipment', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('shipment_id');
            $table->unsignedBigInteger('unit_id');
            $table->string('status')->default('on-dispatch');

            $table->foreign('shipment_id')->references('id')->on('shipments');
            $table->foreign('unit_id')->references('id')->on('units');
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
        Schema::dropIfExists('unit_shipment');
    }
}
