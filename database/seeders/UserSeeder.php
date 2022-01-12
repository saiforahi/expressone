<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use Spatie\Permission\PermissionRegistrar;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // create demo users
        $admin = \App\Models\Admin::create([
            'first_name' => 'Super',
            'last_name'=> 'Admin',
            'email' => 'admin@email.com',
            'phone'=> '01XXXXXXXXX',
            'password' => Hash::make('12345678'),
        ]);
        

        //merchant
        $merchant = \App\Models\User::create([
            'first_name' => 'Demo',
            'last_name'=> 'Merchant',
            'email' => 'merchant@email.com',
            'phone'=> '01XXXXXXXXX',
            'password' => Hash::make('12345678'),
        ]);

        //merchant
        $courier = \App\Models\Courier::create([
            'first_name' => 'Demo',
            'last_name'=> 'Courier',
            'email' => 'courier@email.com',
            'phone'=> '01XXXXXXXXX',
            'employee_id' => '1',
            'password' => Hash::make('12345678'),
        ]);
        
    }
}