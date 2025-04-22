<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Models\Berita;
use App\Models\Pengaduan;
use App\Models\PotensiDesa;
use App\Models\LayananPublik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $role = $user->roles->first()->name ?? 'warga';
        
        // Statistik data
        $statistics = [
            'total_warga' => Warga::count(),
            'layanan_aktif' => LayananPublik::where('status', 'aktif')->count(),
            'potensi_desa' => PotensiDesa::count(),
            'pengaduan_terbaru' => Pengaduan::latest()->take(5)->get(),
            'berita_terbaru' => Berita::latest()->take(5)->get(),
        ];
        
        // Data yang akan ditampilkan berdasarkan role
        $data = [];
        
        switch ($role) {
            case 'super-admin':
                $data = [
                    'title' => 'Dashboard Admin Desa',
                    'menus' => [
                        ['name' => 'Data Desa', 'icon' => 'bx bx-home-circle', 'url' => route('desa.index')],
                        ['name' => 'Pemerintahan', 'icon' => 'bx bx-building-house', 'url' => route('pemerintahan.index')],
                        ['name' => 'Wilayah', 'icon' => 'bx bx-map', 'url' => route('wilayah.index')],
                        ['name' => 'Anggaran', 'icon' => 'bx bx-money', 'url' => route('anggaran.index')],
                        ['name' => 'Potensi Desa', 'icon' => 'bx bx-line-chart', 'url' => route('potensi.index')],
                        ['name' => 'Galeri', 'icon' => 'bx bx-images', 'url' => route('galeri.index')],
                        ['name' => 'Download', 'icon' => 'bx bx-download', 'url' => route('download.index')],
                        ['name' => 'Berita', 'icon' => 'bx bx-news', 'url' => route('berita.index')],
                        ['name' => 'Layanan', 'icon' => 'bx bx-server', 'url' => route('layanan.index')],
                        ['name' => 'Pengaduan', 'icon' => 'bx bx-message-square-dots', 'url' => route('pengaduan.index')],
                    ]
                ];
                break;

            case 'admin-pengaduan':
                $data = [
                    'title' => 'Dashboard Admin Pengaduan',
                    'menus' => [
                        ['name' => 'Pengaduan Masuk', 'icon' => 'bx bx-envelope', 'url' => route('pengaduan.index')],
                        ['name' => 'Pengaduan Diproses', 'icon' => 'bx bx-loader', 'url' => route('pengaduan.index')],
                        ['name' => 'Pengaduan Selesai', 'icon' => 'bx bx-check-circle', 'url' => route('pengaduan.index')],
                    ]
                ];
                break;

            case 'kepala-desa':
                $data = [
                    'title' => 'Dashboard Kepala Desa',
                    'menus' => [
                        ['name' => 'Monitoring Desa', 'icon' => 'bx bx-analyse', 'url' => route('desa.index')],
                        ['name' => 'Laporan Anggaran', 'icon' => 'bx bx-file', 'url' => route('anggaran.index')],
                        ['name' => 'Statistik Pengaduan', 'icon' => 'bx bx-bar-chart', 'url' => route('pengaduan.index')],
                    ]
                ];
                break;

            case 'perangkat-desa':
                $data = [
                    'title' => 'Dashboard Perangkat Desa',
                    'menus' => [
                        ['name' => 'Data Desa', 'icon' => 'bx bx-home-circle', 'url' => route('desa.index')],
                        ['name' => 'Pemerintahan', 'icon' => 'bx bx-building-house', 'url' => route('pemerintahan.index')],
                        ['name' => 'Berita', 'icon' => 'bx bx-news', 'url' => route('berita.index')],
                    ]
                ];
                break;

            case 'moderator':
                $data = [
                    'title' => 'Dashboard Moderator',
                    'menus' => [
                        ['name' => 'Forum Diskusi', 'icon' => 'bx bx-chat', 'url' => route('interaksi.index')],
                        ['name' => 'Komentar', 'icon' => 'bx bx-message', 'url' => route('interaksi.index')],
                    ]
                ];
                break;

            default: // warga
                $data = [
                    'title' => 'Dashboard Warga',
                    'menus' => [
                        ['name' => 'Profil', 'icon' => 'bx bx-user', 'url' => route('profile.edit')],
                        ['name' => 'Buat Pengaduan', 'icon' => 'bx bx-envelope', 'url' => route('pengaduan.create')],
                        ['name' => 'Riwayat Pengaduan', 'icon' => 'bx bx-history', 'url' => route('pengaduan.index')],
                        ['name' => 'Forum Diskusi', 'icon' => 'bx bx-chat', 'url' => route('interaksi.index')],
                    ]
                ];
                break;
        }

        return view('dashboard', array_merge(compact('data', 'user'), $statistics));
    }
} 