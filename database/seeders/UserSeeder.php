<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create Super Admin
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@desa.test',
            'password' => Hash::make('password')
        ]);
        $superAdmin->assignRole('super-admin');

        // Create Admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@desa.test',
            'password' => Hash::make('password')
        ]);
        $admin->assignRole('admin');

        // Create User
        $user = User::create([
            'name' => 'User',
            'email' => 'user@desa.test',
            'password' => Hash::make('password')
        ]);
        $user->assignRole('user');
    }
}
