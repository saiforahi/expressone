<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('point_id');
            $table->unsignedBigInteger('unit_id');
       
            $table->boolean('status')->default(1);

            $table->foreign('point_id')->references('id')->on('points');
            $table->foreign('unit_id')->references('id')->on('units');
            $table->timestamps();
        });

        // \App\Area::create([ 'name' =>'Mirpur','zone_id'=>1,'hub_id'=>'1']);
        // \App\Area::create([ 'name' =>'Uttara','zone_id'=>2,'hub_id'=>'2']);
        // \App\Area::create([ 'name' =>'Kaliayour','zone_id'=>3,'hub_id'=>'3']);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
