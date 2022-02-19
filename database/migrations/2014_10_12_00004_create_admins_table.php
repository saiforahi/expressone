<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            // $table->enum('type',['admin','unit-admin']);
            $table->string('first_name');
            $table->string('last_name');
            $table->ipAddress('ip')->nullable();
            
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone');
            $table->string('password');
            
            $table->enum('status',['0','1'])->default(1);
            $table->string('units')->nullable()->comment('string(separated by comma) of units hold by unit-admin (if type is unit-admin)');
            $table->enum('is_active',['active','inactive']);
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
        Schema::dropIfExists('admins');
    }
}
