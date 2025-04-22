<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\LayananPublik;
use App\Models\Pengaduan;
use App\Models\PotensiDesa;
use App\Models\Warga;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Get total counts
        $totalWarga = Warga::count();
        $totalLayanan = LayananPublik::count();
        $totalPotensi = PotensiDesa::count();
        $totalPengaduan = Pengaduan::where('status', 'pending')->count();

        // Calculate growth percentages (example: compared to last month)
        $lastMonthWarga = Warga::whereMonth('created_at', '=', now()->subMonth()->month)->count();
        $pertumbuhanWarga = $lastMonthWarga > 0 ? (($totalWarga - $lastMonthWarga) / $lastMonthWarga) * 100 : 0;

        $lastMonthLayanan = LayananPublik::whereMonth('created_at', '=', now()->subMonth()->month)->count();
        $pertumbuhanLayanan = $lastMonthLayanan > 0 ? (($totalLayanan - $lastMonthLayanan) / $lastMonthLayanan) * 100 : 0;

        $lastMonthPotensi = PotensiDesa::whereMonth('created_at', '=', now()->subMonth()->month)->count();
        $pertumbuhanPotensi = $lastMonthPotensi > 0 ? (($totalPotensi - $lastMonthPotensi) / $lastMonthPotensi) * 100 : 0;

        // Get recent items
        $pengaduanTerbaru = Pengaduan::with('warga')
            ->latest()
            ->take(5)
            ->get();

        $beritaTerbaru = Berita::latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalWarga',
            'totalLayanan',
            'totalPotensi',
            'totalPengaduan',
            'pertumbuhanWarga',
            'pertumbuhanLayanan',
            'pertumbuhanPotensi',
            'pengaduanTerbaru',
            'beritaTerbaru'
        ));
    }
} 