<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('couriers', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id')->unique()->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('salary')->nullable();
            $table->string('image')->nullable();
            $table->string('nid_no')->nullable()->comment('National ID card number');
            $table->ipAddress('ip')->nullable();
            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('units');

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('address')->nullable();
            $table->string('phone');
            $table->string('password');
            $table->string('password_str');
            $table->date('joining_date')->nullable();

            $table->enum('status',['0','1'])->default(0);
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
        Schema::dropIfExists('couriers');
    }
}
