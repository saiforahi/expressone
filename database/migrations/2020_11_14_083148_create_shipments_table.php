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
            $table->string('invoice_id')->unique();
            $table->string('tracking_code')->unique();
            $table->unsignedBigInteger('merchant_id')->nullable();
            $table->unsignedBigInteger('shipping_charge_id')->nullable()->comment('PK of shipping_charges table');
            $table->unsignedBigInteger('delivery_location_id')->nullable();
            $table->unsignedBigInteger('pickup_location_id')->nullable();
            
            $table->nullableMorphs('added_by');
            $table->json('recipient')->nullable();
            $table->integer('weight')->nullable();
            $table->string('parcel_type')->nullable();
            $table->integer('piece_qty')->nullable();
            $table->enum('service_type',['express','priority'])->nullable();
            
            $table->string('amount')->nullable('Amount to be collected from customer');
            
            $table->longText('note')->nullable();
            $table->integer('shipping_status')->default(0);
            $table->string('status')->default(1);
            $table->timestamp('time_starts')->useCurrent();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('merchant_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('shipping_charge_id')->references('id')->on('shipping_charges')->onDelete('cascade');
            $table->foreign('delivery_location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('pickup_location_id')->references('id')->on('locations')->onDelete('cascade');
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
