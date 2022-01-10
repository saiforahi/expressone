<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\PermissionRegistrar;
class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions

        // create roles and assign existing permissions
        $roleSuperAdmin = Role::create(['name' => 'super-admin']);
        $roleUnitAdmin = Role::create(['name' => 'unit-admin']);
        $roleMerchant = Role::create(['name' => 'merchant']);
        $roleDriver = Role::create(['name' => 'driver']);
        
        // $role2->givePermissionTo('publish articles');
        // $role2->givePermissionTo('unpublish articles');
        //$role3 = Role::create(['name' => 'user']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'first_name' => 'Demo Super',
            'last_name'=> 'Admin',
            'email' => 'admin@email.com',
            'phone'=> '01XXXXXXXXX',
            'password' => Hash::make('12345678'),
        ]);
        $user->assignRole($roleSuperAdmin);

        $user = \App\Models\User::factory()->create([
            'first_name' => 'Demo Unit',
            'last_name'=> 'Admin',
            'email' => 'unit-admin@email.com',
            'password' => Hash::make('12345678'),
            'phone'=> '017XXXXXXXX',
        ]);
        $user->assignRole($roleUnitAdmin);
        //seeding demo driver
        $user = \App\Models\User::factory()->create([
            'first_name' => 'Demo',
            'last_name'=> 'Driver',
            'email' => 'driver@email.com',
            'password' => Hash::make('12345678'),
            'phone'=> '018XXXXXXXX',
        ]);
        $user->assignRole($roleDriver);
        //seeding demo merchant
        $user = \App\Models\User::factory()->create([
            'first_name' => 'Demo',
            'last_name'=> 'Merchant',
            'email' => 'merchant@email.com',
            'password' => Hash::make('12345678'),
            'phone'=> '018XXXXXXXX',
        ]);
        $user->assignRole($roleDriver);
    }
}