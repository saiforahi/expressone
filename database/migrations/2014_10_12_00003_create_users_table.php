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
            // $table->nullableMorphs('inheritable');
            $table->string('first_name');
            $table->string('last_name');
            $table->ipAddress('ip')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('image')->nullable();
            $table->string('phone');
            $table->string('password');
            $table->string('password_str');
            $table->string('shop_name')->nullable();
            $table->string('nid_no')->unique()->nullable()->comment('National ID card number');
            $table->string('bin_no')->unique()->nullable()->comment('Business Identification number');
            $table->string('bank_name')->nullable();
            $table->string('bank_br_name')->nullable();
            $table->string('bank_acc_name')->nullable();
            $table->bigInteger('bank_acc_no')->nullable();
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->string('address')->nullable();
            $table->string('website_link')->nullable();
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
