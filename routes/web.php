<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Data Desa Routes
    Route::resource('desa', 'App\Http\Controllers\DesaController');
    Route::resource('pemerintahan', 'App\Http\Controllers\PemerintahanController');
    Route::resource('wilayah', 'App\Http\Controllers\WilayahController');

    // Kependudukan Routes
    Route::resource('warga', 'App\Http\Controllers\WargaController');

    // Layanan Routes
    Route::resource('layanan', 'App\Http\Controllers\LayananPublikController');
    Route::resource('pengaduan', 'App\Http\Controllers\PengaduanController');

    // Informasi Routes
    Route::resource('potensi', 'App\Http\Controllers\PotensiDesaController');
    Route::resource('berita', 'App\Http\Controllers\BeritaController');
    Route::resource('galeri', 'App\Http\Controllers\GaleriController');

    // Dokumen Routes
    Route::resource('download', 'App\Http\Controllers\DownloadAreaController');
    Route::resource('anggaran', 'App\Http\Controllers\TransparansiAnggaranController');

    // Interaksi Routes
    Route::resource('interaksi', 'App\Http\Controllers\InteraksiWargaController');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
