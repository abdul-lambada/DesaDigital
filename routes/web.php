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
use App\Http\Controllers\ErrorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

// Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard Route
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('permission:view dashboard')
        ->name('dashboard');

    // Data Desa Routes
    Route::prefix('desa')->name('desa.')->group(function () {
        Route::get('/', [DesaController::class, 'index'])->name('index')->middleware('permission:view desa');
        Route::get('/create', [DesaController::class, 'create'])->name('create')->middleware('permission:create desa');
        Route::post('/', [DesaController::class, 'store'])->name('store')->middleware('permission:create desa');
        Route::get('/{desa}', [DesaController::class, 'show'])->name('show')->middleware('permission:view desa');
        Route::get('/{desa}/edit', [DesaController::class, 'edit'])->name('edit')->middleware('permission:edit desa');
        Route::put('/{desa}', [DesaController::class, 'update'])->name('update')->middleware('permission:edit desa');
        Route::delete('/{desa}', [DesaController::class, 'destroy'])->name('destroy')->middleware('permission:delete desa');
    });

    // Pemerintahan Routes
    Route::prefix('pemerintahan')->name('pemerintahan.')->group(function () {
        Route::get('/', [PemerintahanController::class, 'index'])->name('index');
        Route::get('/create', [PemerintahanController::class, 'create'])->name('create');
        Route::post('/', [PemerintahanController::class, 'store'])->name('store');
        Route::get('/{pemerintahan}', [PemerintahanController::class, 'show'])->name('show');
        Route::get('/{pemerintahan}/edit', [PemerintahanController::class, 'edit'])->name('edit');
        Route::put('/{pemerintahan}', [PemerintahanController::class, 'update'])->name('update');
        Route::delete('/{pemerintahan}', [PemerintahanController::class, 'destroy'])->name('destroy');
    });

    // Wilayah Routes
    Route::prefix('wilayah')->name('wilayah.')->group(function () {
        Route::get('/', [WilayahController::class, 'index'])->name('index');
        Route::get('/create', [WilayahController::class, 'create'])->name('create');
        Route::post('/', [WilayahController::class, 'store'])->name('store');
        Route::get('/{wilayah}', [WilayahController::class, 'show'])->name('show');
        Route::get('/{wilayah}/edit', [WilayahController::class, 'edit'])->name('edit');
        Route::put('/{wilayah}', [WilayahController::class, 'update'])->name('update');
        Route::delete('/{wilayah}', [WilayahController::class, 'destroy'])->name('destroy');
    });

    // Kependudukan Routes
    Route::prefix('warga')->name('warga.')->group(function () {
        Route::get('/', [WargaController::class, 'index'])->name('index');
        Route::get('/create', [WargaController::class, 'create'])->name('create');
        Route::post('/', [WargaController::class, 'store'])->name('store');
        Route::get('/{warga}', [WargaController::class, 'show'])->name('show');
        Route::get('/{warga}/edit', [WargaController::class, 'edit'])->name('edit');
        Route::put('/{warga}', [WargaController::class, 'update'])->name('update');
        Route::delete('/{warga}', [WargaController::class, 'destroy'])->name('destroy');
    });

    // Layanan Routes
    Route::prefix('layanan')->name('layanan.')->group(function () {
        Route::get('/', [LayananPublikController::class, 'index'])->name('index');
        Route::get('/create', [LayananPublikController::class, 'create'])->name('create');
        Route::post('/', [LayananPublikController::class, 'store'])->name('store');
        Route::get('/{layanan}', [LayananPublikController::class, 'show'])->name('show');
        Route::get('/{layanan}/edit', [LayananPublikController::class, 'edit'])->name('edit');
        Route::put('/{layanan}', [LayananPublikController::class, 'update'])->name('update');
        Route::delete('/{layanan}', [LayananPublikController::class, 'destroy'])->name('destroy');
    });

    // Pengaduan Routes
    Route::prefix('pengaduan')->name('pengaduan.')->group(function () {
        Route::get('/', [PengaduanController::class, 'index'])->name('index');
        Route::get('/create', [PengaduanController::class, 'create'])->name('create');
        Route::post('/', [PengaduanController::class, 'store'])->name('store');
        Route::get('/{pengaduan}', [PengaduanController::class, 'show'])->name('show');
        Route::get('/{pengaduan}/edit', [PengaduanController::class, 'edit'])->name('edit');
        Route::put('/{pengaduan}', [PengaduanController::class, 'update'])->name('update');
        Route::delete('/{pengaduan}', [PengaduanController::class, 'destroy'])->name('destroy');
    });

    // Informasi Routes
    Route::prefix('potensi')->name('potensi.')->group(function () {
        Route::get('/', [PotensiDesaController::class, 'index'])->name('index');
        Route::get('/create', [PotensiDesaController::class, 'create'])->name('create');
        Route::post('/', [PotensiDesaController::class, 'store'])->name('store');
        Route::get('/{potensi}', [PotensiDesaController::class, 'show'])->name('show');
        Route::get('/{potensi}/edit', [PotensiDesaController::class, 'edit'])->name('edit');
        Route::put('/{potensi}', [PotensiDesaController::class, 'update'])->name('update');
        Route::delete('/{potensi}', [PotensiDesaController::class, 'destroy'])->name('destroy');
    });

    // Berita Routes
    Route::prefix('berita')->name('berita.')->group(function () {
        Route::get('/', [BeritaController::class, 'index'])->name('index');
        Route::get('/create', [BeritaController::class, 'create'])->name('create');
        Route::post('/', [BeritaController::class, 'store'])->name('store');
        Route::get('/{berita}', [BeritaController::class, 'show'])->name('show');
        Route::get('/{berita}/edit', [BeritaController::class, 'edit'])->name('edit');
        Route::put('/{berita}', [BeritaController::class, 'update'])->name('update');
        Route::delete('/{berita}', [BeritaController::class, 'destroy'])->name('destroy');
    });

    // Galeri Routes
    Route::prefix('galeri')->name('galeri.')->group(function () {
        Route::get('/', [GaleriController::class, 'index'])->name('index');
        Route::get('/create', [GaleriController::class, 'create'])->name('create');
        Route::post('/', [GaleriController::class, 'store'])->name('store');
        Route::get('/{galeri}', [GaleriController::class, 'show'])->name('show');
        Route::get('/{galeri}/edit', [GaleriController::class, 'edit'])->name('edit');
        Route::put('/{galeri}', [GaleriController::class, 'update'])->name('update');
        Route::delete('/{galeri}', [GaleriController::class, 'destroy'])->name('destroy');
    });

    // Dokumen Routes
    Route::prefix('download')->name('download.')->group(function () {
        Route::get('/', [DownloadAreaController::class, 'index'])->name('index');
        Route::get('/create', [DownloadAreaController::class, 'create'])->name('create');
        Route::post('/', [DownloadAreaController::class, 'store'])->name('store');
        Route::get('/{download}', [DownloadAreaController::class, 'show'])->name('show');
        Route::get('/{download}/edit', [DownloadAreaController::class, 'edit'])->name('edit');
        Route::put('/{download}', [DownloadAreaController::class, 'update'])->name('update');
        Route::delete('/{download}', [DownloadAreaController::class, 'destroy'])->name('destroy');
    });

    // Anggaran Routes
    Route::prefix('anggaran')->name('anggaran.')->group(function () {
        Route::get('/', [TransparansiAnggaranController::class, 'index'])->name('index');
        Route::get('/create', [TransparansiAnggaranController::class, 'create'])->name('create');
        Route::post('/', [TransparansiAnggaranController::class, 'store'])->name('store');
        Route::get('/{anggaran}', [TransparansiAnggaranController::class, 'show'])->name('show');
        Route::get('/{anggaran}/edit', [TransparansiAnggaranController::class, 'edit'])->name('edit');
        Route::put('/{anggaran}', [TransparansiAnggaranController::class, 'update'])->name('update');
        Route::delete('/{anggaran}', [TransparansiAnggaranController::class, 'destroy'])->name('destroy');
    });

    // Interaksi Routes
    Route::prefix('interaksi')->name('interaksi.')->group(function () {
        Route::get('/', [InteraksiWargaController::class, 'index'])->name('index');
        Route::get('/create', [InteraksiWargaController::class, 'create'])->name('create');
        Route::post('/', [InteraksiWargaController::class, 'store'])->name('store');
        Route::get('/{interaksi}', [InteraksiWargaController::class, 'show'])->name('show');
        Route::get('/{interaksi}/edit', [InteraksiWargaController::class, 'edit'])->name('edit');
        Route::put('/{interaksi}', [InteraksiWargaController::class, 'update'])->name('update');
        Route::delete('/{interaksi}', [InteraksiWargaController::class, 'destroy'])->name('destroy');
    });

    // Profile Routes
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

    // User Management Routes
    Route::prefix('users')->name('users.')->group(function () {
        Route::middleware('permission:create users')->group(function () {
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/', [UserController::class, 'store'])->name('store');
        });

        Route::middleware('permission:view users')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/{user}', [UserController::class, 'show'])->name('show');
        });

        Route::middleware('permission:edit users')->group(function () {
            Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
            Route::put('/{user}', [UserController::class, 'update'])->name('update');
        });

        Route::middleware('permission:delete users')->group(function () {
            Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
        });
    });

    // Role Management Routes
    Route::prefix('roles')->name('roles.')->group(function () {
        Route::middleware('permission:create roles')->group(function () {
            Route::get('/create', [RoleController::class, 'create'])->name('create');
            Route::post('/', [RoleController::class, 'store'])->name('store');
        });

        Route::middleware('permission:view roles')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name('index');
            Route::get('/{role}', [RoleController::class, 'show'])->name('show');
        });

        Route::middleware('permission:edit roles')->group(function () {
            Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('edit');
            Route::put('/{role}', [RoleController::class, 'update'])->name('update');
        });

        Route::middleware('permission:delete roles')->group(function () {
            Route::delete('/{role}', [RoleController::class, 'destroy'])->name('destroy');
        });
    });

    // Permission Routes
    Route::prefix('permissions')->name('permissions.')->group(function () {
        Route::middleware('permission:view permissions')->group(function () {
            Route::get('/', [PermissionController::class, 'index'])->name('index');
            Route::get('/{permission}', [PermissionController::class, 'show'])->name('show');
        });

        Route::middleware('permission:create permissions')->group(function () {
            Route::get('/create', [PermissionController::class, 'create'])->name('create');
            Route::post('/', [PermissionController::class, 'store'])->name('store');
        });

        Route::middleware('permission:edit permissions')->group(function () {
            Route::get('/{permission}/edit', [PermissionController::class, 'edit'])->name('edit');
            Route::put('/{permission}', [PermissionController::class, 'update'])->name('update');
        });

        Route::middleware('permission:delete permissions')->group(function () {
            Route::delete('/{permission}', [PermissionController::class, 'destroy'])->name('destroy');
        });
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

// Error Routes
Route::fallback([ErrorController::class, 'notFound']);

require __DIR__.'/auth.php';
