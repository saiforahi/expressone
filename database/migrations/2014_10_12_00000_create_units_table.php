<?php

use App\Models\Unit;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
        Unit::create(['name' =>'Unit One']);
        Unit::create(['name' =>'Unit Two']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // $table->dropForeign('admin_id');
        // $table->dropColumn('admin_id');
        Schema::dropIfExists('units');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
