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

        // Create Admin Desa
        $adminDesa = User::create([
            'name' => 'Admin Desa',
            'email' => 'admin@desa.test',
            'password' => Hash::make('password')
        ]);
        $adminDesa->assignRole('admin-desa');

        // Create Kepala Desa
        $kepalaDesa = User::create([
            'name' => 'Kepala Desa',
            'email' => 'kepala@desa.test',
            'password' => Hash::make('password')
        ]);
        $kepalaDesa->assignRole('kepala-desa');

        // Create Perangkat Desa
        $perangkatDesa = User::create([
            'name' => 'Perangkat Desa',
            'email' => 'perangkat@desa.test',
            'password' => Hash::make('password')
        ]);
        $perangkatDesa->assignRole('perangkat-desa');

        // Create Sample Warga
        $warga = User::create([
            'name' => 'Warga',
            'email' => 'warga@desa.test',
            'password' => Hash::make('password')
        ]);
        $warga->assignRole('warga');
    }
} 