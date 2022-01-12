<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shipments', function (Blueprint $table) {
            $table->integer('unit_id')->after('invoice_id')->nullable();
            $table->integer('phone')->after('recipient')->nullable();
            $table->string('address')->after('phone')->nullable();
            $table->string('merchant_note')->after('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shipments', function (Blueprint $table) {
            $table->dropColumn('unit_id');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('merchant_note');
        });
    }
}
