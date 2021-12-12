<?php

use App\Hub;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hubs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('zone_id');
            $table->boolean('status')->default(1);
            $table->foreign('zone_id')->references('id')->on('zones');
            $table->timestamps();
        });
        Hub::create(['name' => 'Hub one', 'zone_id' => 1]);
        Hub::create(['name' => 'Hub two', 'zone_id' => 2]);
        Hub::create(['name' => 'Hub three', 'zone_id' => 3]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hubs');
    }
}
