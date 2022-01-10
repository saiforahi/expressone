<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id')->unique();
            $table->integer('tracking_code')->nullable();
            $table->unsignedBigInteger('added_by')->nullable();
            $table->json('recipient')->nullable();
            
            $table->integer('cod_amount')->nullable();
            $table->integer('shipping_charge_id')->nullable()->comment('PK of shipping_charges table');
            $table->integer('weight')->nullable();
            $table->integer('weight_charge')->nullable();
            $table->integer('delivery_charge')->nullable();
            $table->integer('parcel_type')->nullable();
            $table->string('delivery_type')->nullable();
            $table->string('note')->nullable();
            
            $table->string('amount')->nullable('Amount to be collected from customer');
           
            $table->string('shipping_status')->default(0);
            $table->string('status')->default(1);
            
            $table->unsignedBigInteger('delivery_location_id')->nullable();
            $table->unsignedBigInteger('pickup_location_id')->nullable();
            
            $table->foreign('delivery_location_id')->references('id')->on('locations');
            $table->foreign('pickup_location_id')->references('id')->on('locations');
            $table->foreign('added_by')->references('id')->on('users');

            $table->timestamp('time_starts')->useCurrent();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipments');
    }
}
