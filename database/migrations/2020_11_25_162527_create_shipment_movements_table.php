<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB as FacadesDB;

class CreateShipmentMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipment_movements', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('shipment_id');
            $table->unsignedBigInteger('logistic_step_id');
            $table->nullableMorphs('action_made_by');
            $table->string('report_type')->nullable();
            $table->text('note')->nullable();
            $table->string('status')->nullable();

            $table->foreign('shipment_id')->references('id')->on('shipments');
            $table->foreign('logistic_step_id')->references('id')->on('logistic_steps');
            // $table->primary(['id','shipment_id','logistic_step_id']);
            $table->timestamps();
        });
        // FacadesDB::unprepared('ALTER TABLE `shipment_movements` DROP PRIMARY KEY, ADD PRIMARY KEY ( `shipment_id`,`logistic_step_id` )');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipment_movements');
    }
}
