<?php

use App\Models\ShippingCharge;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_charges', function (Blueprint $table) {
            $table->id();
            $table->string('consignment_type');
            $table->double('shipping_amount', 10, 2);
            $table->timestamps();
        });
        ShippingCharge::create(['consignment_type' => 'Regular','shipping_amount'=> 50]);
        ShippingCharge::create(['consignment_type' => 'Express','shipping_amount'=> 80]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipping_charges');
    }
}
