<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourierShipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courier_shipment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('courier_id');
            $table->unsignedBigInteger('shipment_id');
            $table->unsignedBigInteger('admin_id');
            $table->text('note')->nullable();
            $table->enum('type',['delivery','pickup','return'])->nullable()->comment('Types of shipment assigned to courier');
            $table->enum('status',['pending','delivered','partially-delivered','lost','received','cancelled','submitted_to_unit','hold','returned'])->default('pending');
            $table->foreign('courier_id')->references('id')->on('couriers');
            $table->foreign('shipment_id')->references('id')->on('shipments');
            $table->foreign('admin_id')->references('id')->on('admins');
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
        Schema::dropIfExists('courier_shipment');
    }
}
