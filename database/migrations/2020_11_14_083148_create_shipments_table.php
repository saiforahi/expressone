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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('zone_id')->nullable();
            $table->unsignedBigInteger('area_id')->nullable();
            $table->string('added_by')->default('merchant');
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('parcel_value')->nullable();
            $table->string('invoice_id')->unique();
            $table->string('merchant_note')->nullable();
            $table->string('weight')->nullable();
            $table->string('delivery_type')->nullable();
            $table->string('cod')->nullable();
            $table->string('cod_amount')->nullable();
            $table->string('delivery_charge')->nullable();
            $table->string('weight_charge')->nullable();
            $table->string('price')->nullable();
            $table->string('tracking_code')->nullable();
            $table->string('total_price')->nullable();
            $table->string('shipping_status')->default(0);
            $table->string('status')->default(1);
            $table->timestamp('time_starts')->useCurrent();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('zone_id')->references('id')->on('zones');
            $table->foreign('area_id')->references('id')->on('areas');
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
        Schema::dropIfExists('shipments');
    }
}
