<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Models\Berita;
use App\Models\Pengaduan;
use App\Models\PotensiDesa;
use App\Models\LayananPublik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view dashboard')->only('index');
    }

    public function index()
    {
        $user = Auth::user();
        $menuItems = [];

        // Super Admin gets all menu items
        if ($user->hasRole('super-admin')) {
            $menuItems = [
                [
                    'title' => 'Dashboard',
                    'icon' => 'fas fa-tachometer-alt',
                    'url' => route('dashboard'),
                    'permission' => 'view dashboard'
                ],
                [
                    'title' => 'User Management',
                    'icon' => 'fas fa-users',
                    'url' => route('users.index'),
                    'permission' => 'view users'
                ],
                [
                    'title' => 'Role & Permission',
                    'icon' => 'fas fa-user-shield',
                    'url' => route('roles.index'),
                    'permission' => 'view roles'
                ],
                [
                    'title' => 'Desa',
                    'icon' => 'fas fa-home',
                    'url' => route('desa.index'),
                    'permission' => 'view desa'
                ],
                [
                    'title' => 'Pemerintahan',
                    'icon' => 'fas fa-landmark',
                    'url' => route('pemerintahan.index'),
                    'permission' => 'view pemerintahan'
                ],
                [
                    'title' => 'Wilayah',
                    'icon' => 'fas fa-map-marked-alt',
                    'url' => route('wilayah.index'),
                    'permission' => 'view wilayah'
                ],
                [
                    'title' => 'Warga',
                    'icon' => 'fas fa-user-friends',
                    'url' => route('warga.index'),
                    'permission' => 'view warga'
                ],
                [
                    'title' => 'Layanan Publik',
                    'icon' => 'fas fa-concierge-bell',
                    'url' => route('layanan.index'),
                    'permission' => 'view layanan'
                ],
                [
                    'title' => 'Pengaduan',
                    'icon' => 'fas fa-comments',
                    'url' => route('pengaduan.index'),
                    'permission' => 'view pengaduan'
                ],
                [
                    'title' => 'Berita',
                    'icon' => 'fas fa-newspaper',
                    'url' => route('berita.index'),
                    'permission' => 'view berita'
                ],
                [
                    'title' => 'Galeri',
                    'icon' => 'fas fa-images',
                    'url' => route('galeri.index'),
                    'permission' => 'view galeri'
                ],
                [
                    'title' => 'Potensi Desa',
                    'icon' => 'fas fa-chart-line',
                    'url' => route('potensi.index'),
                    'permission' => 'view potensi'
                ],
                [
                    'title' => 'Download Area',
                    'icon' => 'fas fa-download',
                    'url' => route('download.index'),
                    'permission' => 'view download'
                ],
                [
                    'title' => 'Interaksi Warga',
                    'icon' => 'fas fa-comments',
                    'url' => route('interaksi.index'),
                    'permission' => 'view interaksi'
                ],
                [
                    'title' => 'Transparansi Anggaran',
                    'icon' => 'fas fa-money-bill-wave',
                    'url' => route('anggaran.index'),
                    'permission' => 'view anggaran'
                ]
            ];
        }
        // Admin gets limited menu items
        else if ($user->hasRole('admin')) {
            $menuItems = [
                [
                    'title' => 'Dashboard',
                    'icon' => 'fas fa-tachometer-alt',
                    'url' => route('dashboard'),
                    'permission' => 'view dashboard'
                ],
                [
                    'title' => 'Desa',
                    'icon' => 'fas fa-home',
                    'url' => route('desa.index'),
                    'permission' => 'view desa'
                ],
                [
                    'title' => 'Pemerintahan',
                    'icon' => 'fas fa-landmark',
                    'url' => route('pemerintahan.index'),
                    'permission' => 'view pemerintahan'
                ],
                [
                    'title' => 'Wilayah',
                    'icon' => 'fas fa-map-marked-alt',
                    'url' => route('wilayah.index'),
                    'permission' => 'view wilayah'
                ],
                [
                    'title' => 'Warga',
                    'icon' => 'fas fa-user-friends',
                    'url' => route('warga.index'),
                    'permission' => 'view warga'
                ],
                [
                    'title' => 'Layanan Publik',
                    'icon' => 'fas fa-concierge-bell',
                    'url' => route('layanan.index'),
                    'permission' => 'view layanan'
                ],
                [
                    'title' => 'Pengaduan',
                    'icon' => 'fas fa-comments',
                    'url' => route('pengaduan.index'),
                    'permission' => 'view pengaduan'
                ],
                [
                    'title' => 'Berita',
                    'icon' => 'fas fa-newspaper',
                    'url' => route('berita.index'),
                    'permission' => 'view berita'
                ],
                [
                    'title' => 'Galeri',
                    'icon' => 'fas fa-images',
                    'url' => route('galeri.index'),
                    'permission' => 'view galeri'
                ],
                [
                    'title' => 'Potensi Desa',
                    'icon' => 'fas fa-chart-line',
                    'url' => route('potensi.index'),
                    'permission' => 'view potensi'
                ],
                [
                    'title' => 'Download Area',
                    'icon' => 'fas fa-download',
                    'url' => route('download.index'),
                    'permission' => 'view download'
                ],
                [
                    'title' => 'Interaksi Warga',
                    'icon' => 'fas fa-comments',
                    'url' => route('interaksi.index'),
                    'permission' => 'view interaksi'
                ],
                [
                    'title' => 'Transparansi Anggaran',
                    'icon' => 'fas fa-money-bill-wave',
                    'url' => route('anggaran.index'),
                    'permission' => 'view anggaran'
                ]
            ];
        }
        // Regular users get basic menu items
        else {
            $menuItems = [
                [
                    'title' => 'Dashboard',
                    'icon' => 'fas fa-tachometer-alt',
                    'url' => route('dashboard'),
                    'permission' => 'view dashboard'
                ],
                [
                    'title' => 'Layanan Publik',
                    'icon' => 'fas fa-concierge-bell',
                    'url' => route('layanan.index'),
                    'permission' => 'view layanan'
                ],
                [
                    'title' => 'Pengaduan',
                    'icon' => 'fas fa-comments',
                    'url' => route('pengaduan.index'),
                    'permission' => 'view pengaduan'
                ],
                [
                    'title' => 'Berita',
                    'icon' => 'fas fa-newspaper',
                    'url' => route('berita.index'),
                    'permission' => 'view berita'
                ],
                [
                    'title' => 'Galeri',
                    'icon' => 'fas fa-images',
                    'url' => route('galeri.index'),
                    'permission' => 'view galeri'
                ],
                [
                    'title' => 'Potensi Desa',
                    'icon' => 'fas fa-chart-line',
                    'url' => route('potensi.index'),
                    'permission' => 'view potensi'
                ],
                [
                    'title' => 'Download Area',
                    'icon' => 'fas fa-download',
                    'url' => route('download.index'),
                    'permission' => 'view download'
                ],
                [
                    'title' => 'Interaksi Warga',
                    'icon' => 'fas fa-comments',
                    'url' => route('interaksi.index'),
                    'permission' => 'view interaksi'
                ]
            ];
        }

        // Filter menu items based on user permissions
        $menuItems = array_filter($menuItems, function($item) use ($user) {
            return $user->can($item['permission']);
        });

        return view('dashboard', compact('menuItems'));
    }

    private function getDashboardTitle($role)
    {
        $titles = [
            'super-admin' => 'Dashboard Admin Desa',
            'admin-pengaduan' => 'Dashboard Admin Pengaduan',
            'kepala-desa' => 'Dashboard Kepala Desa',
            'perangkat-desa' => 'Dashboard Perangkat Desa',
            'moderator' => 'Dashboard Moderator',
            'warga' => 'Dashboard Warga'
        ];

        return $titles[$role] ?? 'Dashboard';
    }

    private function getMenusByPermissions($user)
    {
        $menus = [];

        // Menu Manajemen User (hanya untuk super-admin)
        if ($user->hasRole('super-admin')) {
            if ($user->hasPermissionTo('view users')) {
                $menus[] = ['name' => 'Manajemen User', 'icon' => 'bx bx-user-circle', 'url' => route('users.index')];
            }
            if ($user->hasPermissionTo('view roles')) {
                $menus[] = ['name' => 'Manajemen Role', 'icon' => 'bx bx-key', 'url' => route('roles.index')];
            }
            if ($user->hasPermissionTo('view permissions')) {
                $menus[] = ['name' => 'Manajemen Permission', 'icon' => 'bx bx-lock', 'url' => route('permissions.index')];
            }
        }

        // Menu Data Desa
        if ($user->hasPermissionTo('view desa')) {
            $menus[] = ['name' => 'Data Desa', 'icon' => 'bx bx-home-circle', 'url' => route('desa.index')];
        }

        // Menu Pemerintahan
        if ($user->hasPermissionTo('view pemerintahan')) {
            $menus[] = ['name' => 'Pemerintahan', 'icon' => 'bx bx-building-house', 'url' => route('pemerintahan.index')];
        }

        // Menu Wilayah
        if ($user->hasPermissionTo('view wilayah')) {
            $menus[] = ['name' => 'Wilayah', 'icon' => 'bx bx-map', 'url' => route('wilayah.index')];
        }

        // Menu Anggaran
        if ($user->hasPermissionTo('view anggaran')) {
            $menus[] = ['name' => 'Anggaran', 'icon' => 'bx bx-money', 'url' => route('anggaran.index')];
        }

        // Menu Potensi Desa
        if ($user->hasPermissionTo('view potensi')) {
            $menus[] = ['name' => 'Potensi Desa', 'icon' => 'bx bx-line-chart', 'url' => route('potensi.index')];
        }

        // Menu Galeri
        if ($user->hasPermissionTo('view galeri')) {
            $menus[] = ['name' => 'Galeri', 'icon' => 'bx bx-images', 'url' => route('galeri.index')];
        }

        // Menu Download
        if ($user->hasPermissionTo('view download')) {
            $menus[] = ['name' => 'Download', 'icon' => 'bx bx-download', 'url' => route('download.index')];
        }

        // Menu Berita
        if ($user->hasPermissionTo('view berita')) {
            $menus[] = ['name' => 'Berita', 'icon' => 'bx bx-news', 'url' => route('berita.index')];
        }

        // Menu Layanan
        if ($user->hasPermissionTo('view layanan')) {
            $menus[] = ['name' => 'Layanan', 'icon' => 'bx bx-server', 'url' => route('layanan.index')];
        }

        // Menu Pengaduan
        if ($user->hasRole('admin-pengaduan')) {
            $menus[] = ['name' => 'Pengaduan Masuk', 'icon' => 'bx bx-envelope', 'url' => route('pengaduan.index', ['status' => 'baru'])];
            $menus[] = ['name' => 'Pengaduan Diproses', 'icon' => 'bx bx-loader', 'url' => route('pengaduan.index', ['status' => 'diproses'])];
            $menus[] = ['name' => 'Pengaduan Selesai', 'icon' => 'bx bx-check-circle', 'url' => route('pengaduan.index', ['status' => 'selesai'])];
        } elseif ($user->hasPermissionTo('view pengaduan')) {
            $menus[] = ['name' => 'Pengaduan', 'icon' => 'bx bx-message-square-dots', 'url' => route('pengaduan.index')];
        }

        // Menu Interaksi Warga
        if ($user->hasPermissionTo('view interaksi')) {
            if ($user->hasRole('moderator')) {
                $menus[] = ['name' => 'Forum Diskusi', 'icon' => 'bx bx-chat', 'url' => route('interaksi.index')];
                $menus[] = ['name' => 'Komentar', 'icon' => 'bx bx-message', 'url' => route('interaksi.index', ['type' => 'komentar'])];
            } else {
                $menus[] = ['name' => 'Forum Diskusi', 'icon' => 'bx bx-chat', 'url' => route('interaksi.index')];
            }
        }

        // Menu Profil (untuk semua user)
        $menus[] = ['name' => 'Profil', 'icon' => 'bx bx-user', 'url' => route('profile.edit')];

        // Menu khusus untuk warga
        if ($user->hasRole('warga')) {
            if ($user->hasPermissionTo('create pengaduan')) {
                $menus[] = ['name' => 'Buat Pengaduan', 'icon' => 'bx bx-envelope', 'url' => route('pengaduan.create')];
            }
            if ($user->hasPermissionTo('view pengaduan')) {
                $menus[] = ['name' => 'Riwayat Pengaduan', 'icon' => 'bx bx-history', 'url' => route('pengaduan.index')];
            }
        }

        // Menu khusus untuk kepala desa
        if ($user->hasRole('kepala-desa')) {
            $menus[] = ['name' => 'Monitoring Desa', 'icon' => 'bx bx-analyse', 'url' => route('desa.index')];
            if ($user->hasPermissionTo('view anggaran')) {
                $menus[] = ['name' => 'Laporan Anggaran', 'icon' => 'bx bx-file', 'url' => route('anggaran.index')];
            }
            if ($user->hasPermissionTo('view pengaduan')) {
                $menus[] = ['name' => 'Statistik Pengaduan', 'icon' => 'bx bx-bar-chart', 'url' => route('pengaduan.index')];
            }
        }

        return $menus;
    }
}