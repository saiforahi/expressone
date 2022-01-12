<?php

use App\Models\Mail_configuration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateMailConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_configurations', function (Blueprint $table) {
            $table->id();
            $table->string('type')->comment('default: config');
            $table->string('username');
            $table->string('password');
            $table->string('send_email')->comment('referrece email to send mail');
            $table->timestamps();
        });
        Mail_configuration::create([
            'type'=>'config',
            'username'=>'knockme18@gmial.com',
            'password'=>'password',
            'send_email'=>'info.n121@gmail.com'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mail_configurations');
    }
}
