<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Location;

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
            $table->timestamps();

            $table->foreign('point_id')->references('id')->on('points');
            $table->foreign('unit_id')->references('id')->on('units');
        });
        Location::create([ 'name' =>'Mirpur','point_id'=>1,'unit_id'=>1, 'status'=> 1]);
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
