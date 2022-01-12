<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipment_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shipment_id')->unique();
            $table->string('sl_no')->unique();
            $table->string('tracking_code')->unique();
            $table->string('invoice_no')->unique();
            $table->unsignedBigInteger('admin_id');
            $table->float('amount',8,2)->nullable();
            $table->float('delivery_charge',8,2)->nullable();
            $table->integer('weight_charge')->nullable();
            $table->float('outstanding_amount',8,2)->nullable();
            $table->enum('status',['paid','due'])->nullable();

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
        Schema::dropIfExists('shipment_delivery_payments');
    }
}
