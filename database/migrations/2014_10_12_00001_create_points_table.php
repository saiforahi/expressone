<?php

use App\Models\Point;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('unit_id');
            $table->boolean('status')->default(1);
            $table->foreign('unit_id')->references('id')->on('units');
            $table->timestamps();
        });
        Point::create(['name' => 'Dhaka','unit_id'=> 1,'status'=> 1]);
        Point::create(['name' => 'CTG','unit_id'=> 2,'status'=> 1]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('points');
    }
}
