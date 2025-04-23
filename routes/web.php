<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\PemerintahanController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\LayananPublikController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PotensiDesaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\DownloadAreaController;
use App\Http\Controllers\TransparansiAnggaranController;
use App\Http\Controllers\InteraksiWargaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware(['auth', 'permission:view dashboard'])
        ->name('dashboard');

    // Data Desa Routes
    Route::middleware(['permission:view desa'])->group(function () {
        Route::get('/desa', [DesaController::class, 'index'])->name('desa.index');
        Route::get('/desa/{id}', [DesaController::class, 'show'])->name('desa.show');
    });
    
    Route::middleware(['permission:create desa'])->group(function () {
        Route::get('/desa/create', [DesaController::class, 'create'])->name('desa.create');
        Route::post('/desa', [DesaController::class, 'store'])->name('desa.store');
    });
    
    Route::middleware(['permission:edit desa'])->group(function () {
        Route::get('/desa/{id}/edit', [DesaController::class, 'edit'])->name('desa.edit');
        Route::put('/desa/{id}', [DesaController::class, 'update'])->name('desa.update');
    });
    
    Route::middleware(['permission:delete desa'])->group(function () {
        Route::delete('/desa/{id}', [DesaController::class, 'destroy'])->name('desa.destroy');
    });

    Route::get('/pemerintahan', [PemerintahanController::class, 'index'])->name('pemerintahan.index');
    Route::get('/pemerintahan/create', [PemerintahanController::class, 'create'])->name('pemerintahan.create');
    Route::post('/pemerintahan', [PemerintahanController::class, 'store'])->name('pemerintahan.store');
    Route::get('/pemerintahan/{id}', [PemerintahanController::class, 'show'])->name('pemerintahan.show');
    Route::get('/pemerintahan/{id}/edit', [PemerintahanController::class, 'edit'])->name('pemerintahan.edit');
    Route::put('/pemerintahan/{id}', [PemerintahanController::class, 'update'])->name('pemerintahan.update');
    Route::delete('/pemerintahan/{id}', [PemerintahanController::class, 'destroy'])->name('pemerintahan.destroy');

    Route::get('/wilayah', [WilayahController::class, 'index'])->name('wilayah.index');
    Route::get('/wilayah/create', [WilayahController::class, 'create'])->name('wilayah.create');
    Route::post('/wilayah', [WilayahController::class, 'store'])->name('wilayah.store');
    Route::get('/wilayah/{id}', [WilayahController::class, 'show'])->name('wilayah.show');
    Route::get('/wilayah/{id}/edit', [WilayahController::class, 'edit'])->name('wilayah.edit');
    Route::put('/wilayah/{id}', [WilayahController::class, 'update'])->name('wilayah.update');
    Route::delete('/wilayah/{id}', [WilayahController::class, 'destroy'])->name('wilayah.destroy');

    // Kependudukan Routes
    Route::get('/warga', [WargaController::class, 'index'])->name('warga.index');
    Route::get('/warga/create', [WargaController::class, 'create'])->name('warga.create');
    Route::post('/warga', [WargaController::class, 'store'])->name('warga.store');
    Route::get('/warga/{id}', [WargaController::class, 'show'])->name('warga.show');
    Route::get('/warga/{id}/edit', [WargaController::class, 'edit'])->name('warga.edit');
    Route::put('/warga/{id}', [WargaController::class, 'update'])->name('warga.update');
    Route::delete('/warga/{id}', [WargaController::class, 'destroy'])->name('warga.destroy');

    // Layanan Routes
    Route::get('/layanan', [LayananPublikController::class, 'index'])->name('layanan.index');
    Route::get('/layanan/create', [LayananPublikController::class, 'create'])->name('layanan.create');
    Route::post('/layanan', [LayananPublikController::class, 'store'])->name('layanan.store');
    Route::get('/layanan/{id}', [LayananPublikController::class, 'show'])->name('layanan.show');
    Route::get('/layanan/{id}/edit', [LayananPublikController::class, 'edit'])->name('layanan.edit');
    Route::put('/layanan/{id}', [LayananPublikController::class, 'update'])->name('layanan.update');
    Route::delete('/layanan/{id}', [LayananPublikController::class, 'destroy'])->name('layanan.destroy');

    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
    Route::get('/pengaduan/create', [PengaduanController::class, 'create'])->name('pengaduan.create');
    Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
    Route::get('/pengaduan/{id}', [PengaduanController::class, 'show'])->name('pengaduan.show');
    Route::get('/pengaduan/{id}/edit', [PengaduanController::class, 'edit'])->name('pengaduan.edit');
    Route::put('/pengaduan/{id}', [PengaduanController::class, 'update'])->name('pengaduan.update');
    Route::delete('/pengaduan/{id}', [PengaduanController::class, 'destroy'])->name('pengaduan.destroy');

    // Informasi Routes
    Route::get('/potensi', [PotensiDesaController::class, 'index'])->name('potensi.index');
    Route::get('/potensi/create', [PotensiDesaController::class, 'create'])->name('potensi.create');
    Route::post('/potensi', [PotensiDesaController::class, 'store'])->name('potensi.store');
    Route::get('/potensi/{id}', [PotensiDesaController::class, 'show'])->name('potensi.show');
    Route::get('/potensi/{id}/edit', [PotensiDesaController::class, 'edit'])->name('potensi.edit');
    Route::put('/potensi/{id}', [PotensiDesaController::class, 'update'])->name('potensi.update');
    Route::delete('/potensi/{id}', [PotensiDesaController::class, 'destroy'])->name('potensi.destroy');

    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
    Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');

    Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
    Route::get('/galeri/create', [GaleriController::class, 'create'])->name('galeri.create');
    Route::post('/galeri', [GaleriController::class, 'store'])->name('galeri.store');
    Route::get('/galeri/{id}', [GaleriController::class, 'show'])->name('galeri.show');
    Route::get('/galeri/{id}/edit', [GaleriController::class, 'edit'])->name('galeri.edit');
    Route::put('/galeri/{id}', [GaleriController::class, 'update'])->name('galeri.update');
    Route::delete('/galeri/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');

    // Dokumen Routes
    Route::get('/download', [DownloadAreaController::class, 'index'])->name('download.index');
    Route::get('/download/create', [DownloadAreaController::class, 'create'])->name('download.create');
    Route::post('/download', [DownloadAreaController::class, 'store'])->name('download.store');
    Route::get('/download/{id}', [DownloadAreaController::class, 'show'])->name('download.show');
    Route::get('/download/{id}/edit', [DownloadAreaController::class, 'edit'])->name('download.edit');
    Route::put('/download/{id}', [DownloadAreaController::class, 'update'])->name('download.update');
    Route::delete('/download/{id}', [DownloadAreaController::class, 'destroy'])->name('download.destroy');

    Route::get('/anggaran', [TransparansiAnggaranController::class, 'index'])->name('anggaran.index');
    Route::get('/anggaran/create', [TransparansiAnggaranController::class, 'create'])->name('anggaran.create');
    Route::post('/anggaran', [TransparansiAnggaranController::class, 'store'])->name('anggaran.store');
    Route::get('/anggaran/{id}', [TransparansiAnggaranController::class, 'show'])->name('anggaran.show');
    Route::get('/anggaran/{id}/edit', [TransparansiAnggaranController::class, 'edit'])->name('anggaran.edit');
    Route::put('/anggaran/{id}', [TransparansiAnggaranController::class, 'update'])->name('anggaran.update');
    Route::delete('/anggaran/{id}', [TransparansiAnggaranController::class, 'destroy'])->name('anggaran.destroy');

    // Interaksi Routes
    Route::get('/interaksi', [InteraksiWargaController::class, 'index'])->name('interaksi.index');
    Route::get('/interaksi/create', [InteraksiWargaController::class, 'create'])->name('interaksi.create');
    Route::post('/interaksi', [InteraksiWargaController::class, 'store'])->name('interaksi.store');
    Route::get('/interaksi/{id}', [InteraksiWargaController::class, 'show'])->name('interaksi.show');
    Route::get('/interaksi/{id}/edit', [InteraksiWargaController::class, 'edit'])->name('interaksi.edit');
    Route::put('/interaksi/{id}', [InteraksiWargaController::class, 'update'])->name('interaksi.update');
    Route::delete('/interaksi/{id}', [InteraksiWargaController::class, 'destroy'])->name('interaksi.destroy');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User Management Routes
    Route::middleware(['permission:view users'])->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    });
    
    Route::middleware(['permission:create users'])->group(function () {
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
    });
    
    Route::middleware(['permission:edit users'])->group(function () {
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    });
    
    Route::middleware(['permission:delete users'])->group(function () {
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    // Role Management Routes
    Route::middleware(['permission:view roles'])->group(function () {
        Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/roles/{id}', [RoleController::class, 'show'])->name('roles.show');
    });
    
    Route::middleware(['permission:create roles'])->group(function () {
        Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    });
    
    Route::middleware(['permission:edit roles'])->group(function () {
        Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
        Route::put('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
    });
    
    Route::middleware(['permission:delete roles'])->group(function () {
        Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
    });
    
    // Permission Routes
    Route::middleware(['permission:view permissions'])->group(function () {
        Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
        Route::get('/permissions/{id}', [PermissionController::class, 'show'])->name('permissions.show');
    });
    
    Route::middleware(['permission:create permissions'])->group(function () {
        Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
        Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store');
    });
    
    Route::middleware(['permission:edit permissions'])->group(function () {
        Route::get('/permissions/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
        Route::put('/permissions/{id}', [PermissionController::class, 'update'])->name('permissions.update');
    });
    
    Route::middleware(['permission:delete permissions'])->group(function () {
        Route::delete('/permissions/{id}', [PermissionController::class, 'destroy'])->name('permissions.destroy');
    });
});

// Test route to check permissions
Route::get('/check-permissions', function () {
    $user = auth()->user();
    if (!$user) {
        return 'Not logged in';
    }
    
    return [
        'roles' => $user->roles->pluck('name'),
        'permissions' => $user->permissions->pluck('name'),
        'all_permissions' => $user->getAllPermissions()->pluck('name'),
    ];
})->middleware('auth');

require __DIR__.'/auth.php';
