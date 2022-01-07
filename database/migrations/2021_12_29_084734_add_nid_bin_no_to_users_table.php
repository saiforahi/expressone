<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNidBinNoToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('national_id')->after("phone")->nullable();
            $table->integer('bin_no')->after("national_id")->nullable();
            $table->string('bank_name')->after("bin_no")->nullable();
            $table->string('bank_br_name')->after("bank_name")->nullable();
            $table->string('bank_acc_name')->after("bank_br_name")->nullable();
            $table->bigInteger('bank_acc_no')->after("bank_acc_name")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('national_id');
            $table->dropColumn('bin_no');
            $table->dropColumn('bank_name');
            $table->dropColumn('bank_br_name');
            $table->dropColumn('bank_acc_name');
            $table->dropColumn('bank_acc_no');
        });
    }
}
