<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::firstOrCreate([
            'name' => 'Administrator',
        ],[
            'name' => 'Administrator',
            'guard_name' => 'web'
        ]);

        Role::firstOrCreate([
            'name' => 'Teacher',
        ],[
            'name' => 'Teacher',
            'guard_name' => 'web'
        ]);

        Role::firstOrCreate([
            'name' => 'Employee',
        ],[
            'name' => 'Employee',
            'guard_name' => 'web'
        ]);

        Role::firstOrCreate([
            'name' => 'Super Admin',
        ],[
            'name' => 'Super Admin',
            'guard_name' => 'web'
        ]);
    }
}