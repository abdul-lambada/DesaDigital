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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware(['auth'])
        ->name('dashboard');

    // Data Desa Routes
    Route::resource('desa', DesaController::class);
    Route::resource('pemerintahan', PemerintahanController::class);
    Route::resource('wilayah', WilayahController::class);

    // Kependudukan Routes
    Route::resource('warga', WargaController::class);

    // Layanan Routes
    Route::resource('layanan', LayananPublikController::class);
    Route::resource('pengaduan', PengaduanController::class);

    // Informasi Routes
    Route::resource('potensi', PotensiDesaController::class);
    Route::resource('berita', BeritaController::class);
    Route::resource('galeri', GaleriController::class);

    // Dokumen Routes
    Route::resource('download', DownloadAreaController::class);
    Route::resource('anggaran', TransparansiAnggaranController::class);

    // Interaksi Routes
    Route::resource('interaksi', InteraksiWargaController::class);

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User Management Routes
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
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
