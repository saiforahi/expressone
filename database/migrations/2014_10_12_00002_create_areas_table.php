<?php

use App\Area;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('zone_id');
            $table->unsignedBigInteger('hub_id');

            $table->boolean('status')->default(1);
            $table->foreign('zone_id')->references('id')->on('zones');
            $table->foreign('hub_id')->references('id')->on('hubs');
            $table->timestamps();
        });

        Area::create(['name' => 'Mirpur', 'zone_id' => 1, 'hub_id' => '1']);
        Area::create(['name' => 'Uttara', 'zone_id' => 2, 'hub_id' => '2']);
        Area::create(['name' => 'Kaliayour', 'zone_id' => 3, 'hub_id' => '3']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('areas');
    }
}
