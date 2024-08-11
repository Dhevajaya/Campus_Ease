<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Enums\RoleEnum;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userSuperAdmin = User::firstOrCreate([
            'email' => 'superadmin@gmail.com'
        ],[
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'phone' => '085769782106',
            'password' => bcrypt('123456789'),
            'email_verified_at' => date('Y-m-d H:i:s'),
        ]);

        $userSuperAdmin->assignRole(RoleEnum::SUPERADMIN);

        $userAdministrator = User::firstOrCreate([
            'email' => 'admin@gmail.com'
        ],[
            'name' => 'Administrator',
            'username' => 'administrator',
            'email' => 'admin@gmail.com',
            'phone' => '085769782101',
            'password' => bcrypt('123456789'),
            'email_verified_at' => date('Y-m-d H:i:s'),
        ]);

        $userAdministrator->assignRole(RoleEnum::ADMINISTRATOR);

        $userTeacher = User::firstOrCreate([
            'email' => 'teacher@gmail.com'
        ],[
            'name' => 'Teacher',
            'username' => 'teacher',
            'email' => 'teacher@gmail.com',
            'phone' => '085769782100',
            'password' => bcrypt('123456789'),
            'email_verified_at' => date('Y-m-d H:i:s'),
        ]);

        $userTeacher->assignRole(RoleEnum::TEACHER);

        $employeeTeacher = User::firstOrCreate([
            'email' => 'employee@gmail.com'
        ],[
            'name' => 'Employee',
            'username' => 'employee',
            'email' => 'employee@gmail.com',
            'phone' => '085769782190',
            'password' => bcrypt('123456789'),
            'email_verified_at' => date('Y-m-d H:i:s'),
        ]);

        $employeeTeacher->assignRole(RoleEnum::EMPLOYEE);
    }
}