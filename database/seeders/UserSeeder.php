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
        $admin= \App\Models\Admin::create([
            'type'=>'admin',
        ]);
        $user = \App\Models\User::create([
            'first_name' => 'Demo Super',
            'last_name'=> 'Admin',
            'email' => 'admin@email.com',
            'phone'=> '01XXXXXXXXX',
            'password' => Hash::make('12345678'),
        ]);
        $user->inheritable()->associate($admin)->save();

        //merchant
        $merchant= \App\Models\Merchant::create([
            'shop_name'=>'ABC Shop',
        ]);
        $user = \App\Models\User::create([
            'first_name' => 'Demo Merchant',
            'last_name'=> 'Merchant',
            'email' => 'merchant@email.com',
            'phone'=> '01XXXXXXXXX',
            'password' => Hash::make('12345678'),
        ]);
        $user->inheritable()->associate($merchant)->save();
    }
}