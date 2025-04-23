<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            // Manajemen Pengguna
            'view users', 'create users', 'edit users', 'delete users',
            'view roles', 'create roles', 'edit roles', 'delete roles',
            'view permissions', 'create permissions', 'edit permissions', 'delete permissions',
            
            // Data Desa
            'view desa', 'create desa', 'edit desa', 'delete desa',
            'view pemerintahan', 'create pemerintahan', 'edit pemerintahan', 'delete pemerintahan',
            'view wilayah', 'create wilayah', 'edit wilayah', 'delete wilayah',
            
            // Kependudukan
            'view warga', 'create warga', 'edit warga', 'delete warga',
            'view keluarga', 'create keluarga', 'edit keluarga', 'delete keluarga',
            
            // Layanan
            'view layanan', 'create layanan', 'edit layanan', 'delete layanan',
            'view pengaduan', 'create pengaduan', 'respond pengaduan', 'delete pengaduan',
            
            // Informasi
            'view berita', 'create berita', 'edit berita', 'delete berita',
            'view galeri', 'create galeri', 'edit galeri', 'delete galeri',
            'view potensi', 'create potensi', 'edit potensi', 'delete potensi',
            
            // Dokumen
            'view dokumen', 'create dokumen', 'edit dokumen', 'delete dokumen',
            'view anggaran', 'create anggaran', 'edit anggaran', 'delete anggaran',
            
            // Interaksi
            'view interaksi', 'create interaksi', 'moderate interaksi', 'delete interaksi',
            'view komentar', 'create komentar', 'moderate komentar', 'delete komentar'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles and assign permissions
        // Super Admin
        $superAdmin = Role::firstOrCreate(['name' => 'super-admin']);
        $superAdmin->givePermissionTo(Permission::all());

        // Admin Desa
        $adminDesa = Role::firstOrCreate(['name' => 'admin-desa']);
        $adminDesa->givePermissionTo([
            'view users', 'create users', 'edit users',
            'view roles', 'view permissions',
            'view desa', 'edit desa',
            'view pemerintahan', 'edit pemerintahan',
            'view wilayah', 'edit wilayah',
            'view warga', 'create warga', 'edit warga',
            'view keluarga', 'create keluarga', 'edit keluarga',
            'view layanan', 'edit layanan',
            'view pengaduan', 'respond pengaduan',
            'view berita', 'create berita', 'edit berita',
            'view galeri', 'create galeri', 'edit galeri',
            'view dokumen', 'create dokumen', 'edit dokumen',
            'view anggaran', 'edit anggaran',
            'moderate interaksi', 'moderate komentar'
        ]);

        // Kepala Desa
        $kepalaDesa = Role::firstOrCreate(['name' => 'kepala-desa']);
        $kepalaDesa->givePermissionTo([
            'view desa', 'view pemerintahan', 'view wilayah',
            'view warga', 'view keluarga',
            'view layanan', 'view pengaduan', 'respond pengaduan',
            'view berita', 'view galeri', 'view potensi',
            'view dokumen', 'view anggaran',
            'view interaksi', 'view komentar'
        ]);

        // Perangkat Desa
        $perangkatDesa = Role::firstOrCreate(['name' => 'perangkat-desa']);
        $perangkatDesa->givePermissionTo([
            'view warga', 'create warga', 'edit warga',
            'view keluarga', 'create keluarga', 'edit keluarga',
            'view layanan', 'create layanan',
            'view pengaduan', 'respond pengaduan',
            'view berita', 'create berita',
            'view dokumen', 'create dokumen'
        ]);

        // Warga
        $warga = Role::firstOrCreate(['name' => 'warga']);
        $warga->givePermissionTo([
            'view desa', 'view pemerintahan', 'view wilayah',
            'view layanan', 'create pengaduan',
            'view berita', 'view galeri', 'view potensi',
            'view dokumen',
            'create interaksi', 'create komentar'
        ]);
    }
} 