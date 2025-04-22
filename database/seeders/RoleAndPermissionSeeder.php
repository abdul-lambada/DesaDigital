<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        // Desa permissions
        Permission::create(['name' => 'view desa']);
        Permission::create(['name' => 'create desa']);
        Permission::create(['name' => 'edit desa']);
        Permission::create(['name' => 'delete desa']);

        // Pemerintahan permissions
        Permission::create(['name' => 'view pemerintahan']);
        Permission::create(['name' => 'create pemerintahan']);
        Permission::create(['name' => 'edit pemerintahan']);
        Permission::create(['name' => 'delete pemerintahan']);

        // Wilayah permissions
        Permission::create(['name' => 'view wilayah']);
        Permission::create(['name' => 'create wilayah']);
        Permission::create(['name' => 'edit wilayah']);
        Permission::create(['name' => 'delete wilayah']);

        // Warga permissions
        Permission::create(['name' => 'view warga']);
        Permission::create(['name' => 'create warga']);
        Permission::create(['name' => 'edit warga']);
        Permission::create(['name' => 'delete warga']);

        // Anggaran permissions
        Permission::create(['name' => 'view anggaran']);
        Permission::create(['name' => 'create anggaran']);
        Permission::create(['name' => 'edit anggaran']);
        Permission::create(['name' => 'delete anggaran']);

        // Potensi Desa permissions
        Permission::create(['name' => 'view potensi']);
        Permission::create(['name' => 'create potensi']);
        Permission::create(['name' => 'edit potensi']);
        Permission::create(['name' => 'delete potensi']);

        // Galeri permissions
        Permission::create(['name' => 'view galeri']);
        Permission::create(['name' => 'create galeri']);
        Permission::create(['name' => 'edit galeri']);
        Permission::create(['name' => 'delete galeri']);

        // Download permissions
        Permission::create(['name' => 'view download']);
        Permission::create(['name' => 'create download']);
        Permission::create(['name' => 'edit download']);
        Permission::create(['name' => 'delete download']);

        // Berita permissions
        Permission::create(['name' => 'view berita']);
        Permission::create(['name' => 'create berita']);
        Permission::create(['name' => 'edit berita']);
        Permission::create(['name' => 'delete berita']);

        // Layanan permissions
        Permission::create(['name' => 'view layanan']);
        Permission::create(['name' => 'create layanan']);
        Permission::create(['name' => 'edit layanan']);
        Permission::create(['name' => 'delete layanan']);

        // Pengaduan permissions
        Permission::create(['name' => 'view pengaduan']);
        Permission::create(['name' => 'create pengaduan']);
        Permission::create(['name' => 'respond pengaduan']);
        Permission::create(['name' => 'delete pengaduan']);

        // Interaksi permissions
        Permission::create(['name' => 'view interaksi']);
        Permission::create(['name' => 'create interaksi']);
        Permission::create(['name' => 'moderate interaksi']);
        Permission::create(['name' => 'delete interaksi']);

        // Create roles and assign permissions
        
        // Admin Desa (Super Admin)
        $superAdmin = Role::create(['name' => 'super-admin']);
        $superAdmin->givePermissionTo(Permission::all());

        // Admin Pengaduan
        $adminPengaduan = Role::create(['name' => 'admin-pengaduan']);
        $adminPengaduan->givePermissionTo([
            'view pengaduan',
            'respond pengaduan',
            'delete pengaduan'
        ]);

        // Kepala Desa
        $kepalaDesa = Role::create(['name' => 'kepala-desa']);
        $kepalaDesa->givePermissionTo([
            'view desa',
            'view pemerintahan',
            'view wilayah',
            'view warga',
            'view anggaran',
            'view potensi',
            'view galeri',
            'view download',
            'view berita',
            'view layanan',
            'view pengaduan'
        ]);

        // Perangkat Desa
        $perangkatDesa = Role::create(['name' => 'perangkat-desa']);
        $perangkatDesa->givePermissionTo([
            'view desa',
            'edit desa',
            'view pemerintahan',
            'edit pemerintahan',
            'view wilayah',
            'edit wilayah',
            'view warga',
            'create warga',
            'edit warga',
            'view berita',
            'create berita',
            'edit berita'
        ]);

        // Moderator
        $moderator = Role::create(['name' => 'moderator']);
        $moderator->givePermissionTo([
            'view interaksi',
            'moderate interaksi',
            'delete interaksi'
        ]);

        // Warga
        $warga = Role::create(['name' => 'warga']);
        $warga->givePermissionTo([
            'view desa',
            'view pemerintahan',
            'view wilayah',
            'view potensi',
            'view galeri',
            'view download',
            'view berita',
            'view layanan',
            'create pengaduan',
            'view pengaduan',
            'create interaksi',
            'view interaksi'
        ]);
    }
} 