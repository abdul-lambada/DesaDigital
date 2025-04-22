<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Models\LayananPublik;
use App\Models\PotensiDesa;
use App\Models\Pengaduan;
use App\Models\Berita;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'total_warga' => Warga::count(),
            'layanan_aktif' => LayananPublik::where('status', 'aktif')->count(),
            'potensi_desa' => PotensiDesa::count(),
            'pengaduan_terbaru' => Pengaduan::latest()->take(5)->get(),
            'berita_terbaru' => Berita::latest()->take(5)->get(),
        ];

        return view('dashboard', $data);
    }
} 