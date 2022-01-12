<?php

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->enum('type',['admin','unit-admin']);
            $table->string('first_name');
            $table->string('last_name');
            $table->ipAddress('ip')->nullable();
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('password');
            $table->enum('status',['0','1'])->default(1);
            $table->string('units')->nullable()->comment('string(separated by comma) of units hold by unit-admin (if type is unit-admin)');
            $table->enum('is_active',['active','inactive']);
            $table->timestamps();
        });
        // Admin::create([
        //     'type' => '1', 'first_name' => 'M',
        //     'last_name' => 'Hannan','email' => 'admin@email.com',
        //     'phone' => '01749015457', 'password' => Hash::make('12345678'),
        //     'address' => 'savar',
        //     'status' => 1,
        //     'is_active' => 'active'
        // ]);
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
