@php
    use Illuminate\Support\Facades\Auth;
    
    $role = Auth::user()->roles->first()->name ?? 'warga';
    
    $menuItems = [
        'super-admin' => [
            ['header' => 'Menu Utama'],
            [
                'name' => 'Dashboard',
                'icon' => 'bx bx-home-circle',
                'url' => route('dashboard'),
                'active' => request()->routeIs('dashboard')
            ],
            ['header' => 'Data Master'],
            [
                'name' => 'Data Desa',
                'icon' => 'bx bx-building-house',
                'url' => route('desa.index'),
                'active' => request()->routeIs('desa.*')
            ],
            [
                'name' => 'Pemerintahan',
                'icon' => 'bx bx-buildings',
                'url' => route('pemerintahan.index'),
                'active' => request()->routeIs('pemerintahan.*')
            ],
            [
                'name' => 'Wilayah',
                'icon' => 'bx bx-map',
                'url' => route('wilayah.index'),
                'active' => request()->routeIs('wilayah.*')
            ],
            ['header' => 'Keuangan'],
            [
                'name' => 'Transparansi Anggaran',
                'icon' => 'bx bx-money',
                'url' => route('anggaran.index'),
                'active' => request()->routeIs('anggaran.*')
            ],
            ['header' => 'Konten'],
            [
                'name' => 'Potensi Desa',
                'icon' => 'bx bx-line-chart',
                'url' => route('potensi.index'),
                'active' => request()->routeIs('potensi.*')
            ],
            [
                'name' => 'Berita',
                'icon' => 'bx bx-news',
                'url' => route('berita.index'),
                'active' => request()->routeIs('berita.*')
            ],
            [
                'name' => 'Galeri',
                'icon' => 'bx bx-images',
                'url' => route('galeri.index'),
                'active' => request()->routeIs('galeri.*')
            ],
            [
                'name' => 'Download Area',
                'icon' => 'bx bx-download',
                'url' => route('download.index'),
                'active' => request()->routeIs('download.*')
            ],
            ['header' => 'Layanan'],
            [
                'name' => 'Layanan Publik',
                'icon' => 'bx bx-server',
                'url' => route('layanan.index'),
                'active' => request()->routeIs('layanan.*')
            ],
            [
                'name' => 'Pengaduan',
                'icon' => 'bx bx-message-square-dots',
                'url' => route('pengaduan.index'),
                'active' => request()->routeIs('pengaduan.*')
            ],
            [
                'name' => 'Forum Diskusi',
                'icon' => 'bx bx-chat',
                'url' => route('interaksi.index'),
                'active' => request()->routeIs('interaksi.*')
            ],
        ],
        
        'admin-pengaduan' => [
            ['header' => 'Menu Utama'],
            [
                'name' => 'Dashboard',
                'icon' => 'bx bx-home-circle',
                'url' => route('dashboard'),
                'active' => request()->routeIs('dashboard')
            ],
            ['header' => 'Pengaduan'],
            [
                'name' => 'Semua Pengaduan',
                'icon' => 'bx bx-list-ul',
                'url' => route('pengaduan.index'),
                'active' => request()->routeIs('pengaduan.index')
            ],
            [
                'name' => 'Pengaduan Baru',
                'icon' => 'bx bx-envelope',
                'url' => route('pengaduan.index') . '?status=baru',
                'active' => request()->routeIs('pengaduan.*') && request()->query('status') == 'baru'
            ],
            [
                'name' => 'Sedang Diproses',
                'icon' => 'bx bx-loader',
                'url' => route('pengaduan.index') . '?status=proses',
                'active' => request()->routeIs('pengaduan.*') && request()->query('status') == 'proses'
            ],
            [
                'name' => 'Selesai',
                'icon' => 'bx bx-check-circle',
                'url' => route('pengaduan.index') . '?status=selesai',
                'active' => request()->routeIs('pengaduan.*') && request()->query('status') == 'selesai'
            ],
        ],
        
        'kepala-desa' => [
            ['header' => 'Menu Utama'],
            [
                'name' => 'Dashboard',
                'icon' => 'bx bx-home-circle',
                'url' => route('dashboard'),
                'active' => request()->routeIs('dashboard')
            ],
            ['header' => 'Monitoring'],
            [
                'name' => 'Data Desa',
                'icon' => 'bx bx-building-house',
                'url' => route('desa.index'),
                'active' => request()->routeIs('desa.*')
            ],
            [
                'name' => 'Transparansi Anggaran',
                'icon' => 'bx bx-money',
                'url' => route('anggaran.index'),
                'active' => request()->routeIs('anggaran.*')
            ],
            [
                'name' => 'Statistik Pengaduan',
                'icon' => 'bx bx-bar-chart',
                'url' => route('pengaduan.index'),
                'active' => request()->routeIs('pengaduan.*')
            ],
        ],
        
        'perangkat-desa' => [
            ['header' => 'Menu Utama'],
            [
                'name' => 'Dashboard',
                'icon' => 'bx bx-home-circle',
                'url' => route('dashboard'),
                'active' => request()->routeIs('dashboard')
            ],
            ['header' => 'Data'],
            [
                'name' => 'Data Desa',
                'icon' => 'bx bx-building-house',
                'url' => route('desa.index'),
                'active' => request()->routeIs('desa.*')
            ],
            [
                'name' => 'Pemerintahan',
                'icon' => 'bx bx-buildings',
                'url' => route('pemerintahan.index'),
                'active' => request()->routeIs('pemerintahan.*')
            ],
            ['header' => 'Konten'],
            [
                'name' => 'Berita',
                'icon' => 'bx bx-news',
                'url' => route('berita.index'),
                'active' => request()->routeIs('berita.*')
            ],
        ],
        
        'moderator' => [
            ['header' => 'Menu Utama'],
            [
                'name' => 'Dashboard',
                'icon' => 'bx bx-home-circle',
                'url' => route('dashboard'),
                'active' => request()->routeIs('dashboard')
            ],
            ['header' => 'Moderasi'],
            [
                'name' => 'Forum Diskusi',
                'icon' => 'bx bx-chat',
                'url' => route('interaksi.index'),
                'active' => request()->routeIs('interaksi.*')
            ],
            [
                'name' => 'Komentar',
                'icon' => 'bx bx-message',
                'url' => route('interaksi.index') . '?type=komentar',
                'active' => request()->routeIs('interaksi.*') && request()->query('type') == 'komentar'
            ],
        ],
        
        'warga' => [
            ['header' => 'Menu Utama'],
            [
                'name' => 'Dashboard',
                'icon' => 'bx bx-home-circle',
                'url' => route('dashboard'),
                'active' => request()->routeIs('dashboard')
            ],
            ['header' => 'Layanan'],
            [
                'name' => 'Buat Pengaduan',
                'icon' => 'bx bx-envelope',
                'url' => route('pengaduan.create'),
                'active' => request()->routeIs('pengaduan.create')
            ],
            [
                'name' => 'Riwayat Pengaduan',
                'icon' => 'bx bx-history',
                'url' => route('pengaduan.index'),
                'active' => request()->routeIs('pengaduan.*') && !request()->routeIs('pengaduan.create')
            ],
            [
                'name' => 'Forum Diskusi',
                'icon' => 'bx bx-chat',
                'url' => route('interaksi.index'),
                'active' => request()->routeIs('interaksi.*')
            ],
        ],
    ];

    $currentMenuItems = $menuItems[$role] ?? $menuItems['warga'];
@endphp

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <svg width="25" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <defs>
                        <path d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z" id="path-1"></path>
                        <path d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z" id="path-3"></path>
                        <path d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z" id="path-4"></path>
                        <path d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z" id="path-5"></path>
                    </defs>
                    <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                            <g id="Icon" transform="translate(27.000000, 15.000000)">
                                <g id="Mask" transform="translate(0.000000, 8.000000)">
                                    <mask id="mask-2" fill="white">
                                        <use xlink:href="#path-1"></use>
                                    </mask>
                                    <use fill="#696cff" xlink:href="#path-1"></use>
                                    <g id="Path-3" mask="url(#mask-2)">
                                        <use fill="#696cff" xlink:href="#path-3"></use>
                                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                                    </g>
                                    <g id="Path-4" mask="url(#mask-2)">
                                        <use fill="#696cff" xlink:href="#path-4"></use>
                                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                                    </g>
                                </g>
                                <g id="Triangle" transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                                    <use fill="#696cff" xlink:href="#path-5"></use>
                                    <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">{{ config('app.name') }}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Master Data -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Master Data</span>
        </li>

        <li class="menu-item {{ request()->routeIs('warga.*') ? 'active' : '' }}">
            <a href="{{ route('warga.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Basic">Data Warga</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('layanan.*') ? 'active' : '' }}">
            <a href="{{ route('layanan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-server"></i>
                <div data-i18n="Basic">Layanan</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('pengaduan.*') ? 'active' : '' }}">
            <a href="{{ route('pengaduan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-envelope"></i>
                <div data-i18n="Basic">Pengaduan</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('potensi.*') ? 'active' : '' }}">
            <a href="{{ route('potensi.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-map-alt"></i>
                <div data-i18n="Basic">Potensi Desa</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('berita.*') ? 'active' : '' }}">
            <a href="{{ route('berita.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-news"></i>
                <div data-i18n="Basic">Berita</div>
            </a>
        </li>

        <!-- Settings -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Settings</span>
        </li>

        <li class="menu-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
            <a href="{{ route('users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Basic">Users</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('roles.*') ? 'active' : '' }}">
            <a href="{{ route('roles.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-key"></i>
                <div data-i18n="Basic">Roles</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('permissions.*') ? 'active' : '' }}">
            <a href="{{ route('permissions.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-lock-alt"></i>
                <div data-i18n="Basic">Permissions</div>
            </a>
        </li>
    </ul>
</aside> 