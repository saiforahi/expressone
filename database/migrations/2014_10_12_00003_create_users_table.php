<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->morphs('inheritable');
            $table->string('first_name');
            $table->string('last_name');
            $table->ipAddress('ip')->nullable();
            
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('password');
            
            $table->string('image')->nullable();
            $table->enum('status',['0','1'])->default(1);
            $table->tinyInteger('is_verified')->default(0);
            $table->rememberToken();
            
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
        Schema::dropIfExists('users');
    }
}
