<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

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
            // Dashboard
            'view dashboard',

            // User Management
            'view users',
            'create users',
            'edit users',
            'delete users',

            // Role Management
            'view roles',
            'create roles',
            'edit roles',
            'delete roles',

            // Permission Management
            'view permissions',
            'create permissions',
            'edit permissions',
            'delete permissions',

            // Desa Management
            'view desa',
            'create desa',
            'edit desa',
            'delete desa',

            // Pemerintahan Management
            'view pemerintahan',
            'create pemerintahan',
            'edit pemerintahan',
            'delete pemerintahan',

            // Wilayah Management
            'view wilayah',
            'create wilayah',
            'edit wilayah',
            'delete wilayah',

            // Warga Management
            'view warga',
            'create warga',
            'edit warga',
            'delete warga',

            // Layanan Management
            'view layanan',
            'create layanan',
            'edit layanan',
            'delete layanan',

            // Pengaduan Management
            'view pengaduan',
            'create pengaduan',
            'edit pengaduan',
            'delete pengaduan',

            // Berita Management
            'view berita',
            'create berita',
            'edit berita',
            'delete berita',

            // Galeri Management
            'view galeri',
            'create galeri',
            'edit galeri',
            'delete galeri',

            // Potensi Management
            'view potensi',
            'create potensi',
            'edit potensi',
            'delete potensi',

            // Download Area Management
            'view download',
            'create download',
            'edit download',
            'delete download',

            // Interaksi Management
            'view interaksi',
            'create interaksi',
            'edit interaksi',
            'delete interaksi',

            // Anggaran Management
            'view anggaran',
            'create anggaran',
            'edit anggaran',
            'delete anggaran',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles and assign permissions
        $superAdmin = Role::create(['name' => 'super-admin']);
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);

        // Assign all permissions to super-admin
        $superAdmin->givePermissionTo(Permission::all());

        // Assign specific permissions to admin
        $admin->givePermissionTo([
            'view dashboard',
            'view users',
            'view roles',
            'view permissions',
            'view desa',
            'view pemerintahan',
            'view wilayah',
            'view warga',
            'view layanan',
            'view pengaduan',
            'view berita',
            'view galeri',
            'view potensi',
            'view download',
            'view interaksi',
            'view anggaran',
        ]);

        // Assign basic permissions to user
        $user->givePermissionTo([
            'view dashboard',
            'view desa',
            'view pemerintahan',
            'view wilayah',
            'view layanan',
            'view berita',
            'view galeri',
            'view potensi',
            'view download',
            'view interaksi',
            'view anggaran',
        ]);

        // Create a super-admin user
        $superAdminUser = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => bcrypt('password'),
        ]);

        $superAdminUser->assignRole('super-admin');
    }
}
