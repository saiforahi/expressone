<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\Unit;
use Spatie\Permission\Models\Permission;
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
        //roles for admin
        // app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $role1 = Role::create(['name' => 'super-admin', 'guard_name' => 'admin']);
        $role2 = Role::create(['name' => 'unit-admin', 'guard_name' => 'admin']);
        // create super admin
        $admin = \App\Models\Admin::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'admin@email.com',
            'phone' => '01XXXXXXXXX',
            'password' => Hash::make('12345678'),
        ]);
        $admin->assignRole($role1);
        //unit admin
        $unitadmin = \App\Models\Admin::create([
            'first_name' => 'Unit',
            'last_name' => 'Admin',
            'email' => 'unit-admin@email.com',
            'phone' => '01XXXXXXXXZ',
            'password' => Hash::make('12345678'),
        ]);
        $unitadmin->assignRole($role2);
        Unit::find(1)->update(['admin_id' => $unitadmin->id]);
        //unit admin 2
        $unitadmin = \App\Models\Admin::create([
            'first_name' => 'Unit',
            'last_name' => 'Admin (2)',
            'email' => 'unit-admin2@email.com',
            'phone' => '01XXXXXXXXU',
            'password' => Hash::make('12345678'),
        ]);
        $unitadmin->assignRole($role2);
        Unit::find(2)->update(['admin_id' => $unitadmin->id]);
        //merchant
        $merchant = \App\Models\User::create([
            'first_name' => 'Demo',
            'last_name' => 'Merchant',
            'email' => 'merchant@email.com',
            'shop_name' => 'ABC Enterprise',
            'phone' => '01XXXXXXXXX',
            'password' => Hash::make('12345678'),
            'bank_name' => 'DBBl',
            'bank_br_name' => 'Pallabi',
            'bank_acc_name' => 'John Doe',
            'bank_acc_no' => 108103121415,
            'unit_id' => 1,
            'is_verified' => 1,
            'address' => 'Mirpur',
            'nid_no' => '1234567898',
            'bin_no' => '1234564534563'
        ]);
        //merchant
        $courier = \App\Models\Courier::create([
            'first_name' => 'Demo',
            'last_name' => 'Courier',
            'email' => 'courier@email.com',
            'phone' => '01XXXXXXXXX',
            'employee_id' => '1',
            'password' => Hash::make('12345678'),
        ]);
    }
}
