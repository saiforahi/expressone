<?php

namespace Database\Seeds;

use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        $adminsRecord = [
            [
                'id' => 1,
                'first_name' => 'Dev Admin',
                'last_name' => 'Dev Admin',
                'role_id' => 1,
                'phone' => '01749015457',
                'email' => 'admin@email.com',
                'address' => 'Savar',
                'password' => Hash::make('12345678'),
                'image' => null
            ]

        ];
        DB::table('admins')->insert($adminsRecord);
    }
}
