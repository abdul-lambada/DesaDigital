@php
    use Illuminate\Support\Facades\Auth;
@endphp

<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('sneat/assets/img/favicon/favicon.ico') }}" alt="Brand Logo" class="w-px-40 h-auto">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Desa Digital</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- User Management -->
        <li class="menu-item {{ request()->is('users*') ? 'active' : '' }}">
            <a href="{{ route('users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div>User Management</div>
            </a>
        </li>

        <!-- Role & Permission -->
        <li class="menu-item {{ request()->is('roles*') || request()->is('permissions*') ? 'active' : '' }}">
            <a href="{{ route('roles.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-lock"></i>
                <div>Role & Permission</div>
            </a>
        </li>

        <!-- Data Master -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Data Master</span>
        </li>

        <li class="menu-item {{ request()->is('desa*') ? 'active' : '' }}">
            <a href="{{ route('desa.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-buildings"></i>
                <div>Desa</div>
            </a>
        </li>

        <li class="menu-item {{ request()->is('pemerintahan*') ? 'active' : '' }}">
            <a href="{{ route('pemerintahan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-crown"></i>
                <div>Pemerintahan</div>
            </a>
        </li>

        <li class="menu-item {{ request()->is('wilayah*') ? 'active' : '' }}">
            <a href="{{ route('wilayah.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-map-alt"></i>
                <div>Wilayah</div>
            </a>
        </li>

        <li class="menu-item {{ request()->is('warga*') ? 'active' : '' }}">
            <a href="{{ route('warga.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div>Warga</div>
            </a>
        </li>

        <!-- Layanan -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Layanan</span>
        </li>

        <li class="menu-item {{ request()->is('layanan*') ? 'active' : '' }}">
            <a href="{{ route('layanan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-server"></i>
                <div>Layanan Publik</div>
            </a>
        </li>

        <li class="menu-item {{ request()->is('pengaduan*') ? 'active' : '' }}">
            <a href="{{ route('pengaduan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-message-square-dots"></i>
                <div>Pengaduan</div>
            </a>
        </li>

        <!-- Konten -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Konten</span>
        </li>

        <li class="menu-item {{ request()->is('berita*') ? 'active' : '' }}">
            <a href="{{ route('berita.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-news"></i>
                <div>Berita</div>
            </a>
        </li>

        <li class="menu-item {{ request()->is('galeri*') ? 'active' : '' }}">
            <a href="{{ route('galeri.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-image"></i>
                <div>Galeri</div>
            </a>
        </li>

        <li class="menu-item {{ request()->is('potensi*') ? 'active' : '' }}">
            <a href="{{ route('potensi.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-chart"></i>
                <div>Potensi Desa</div>
            </a>
        </li>

        <li class="menu-item {{ request()->is('download*') ? 'active' : '' }}">
            <a href="{{ route('download.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-download"></i>
                <div>Download Area</div>
            </a>
        </li>

        <li class="menu-item {{ request()->is('interaksi*') ? 'active' : '' }}">
            <a href="{{ route('interaksi.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-conversation"></i>
                <div>Interaksi Warga</div>
            </a>
        </li>

        <!-- Keuangan -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Keuangan</span>
        </li>

        <li class="menu-item {{ request()->is('anggaran*') ? 'active' : '' }}">
            <a href="{{ route('anggaran.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-money"></i>
                <div>Transparansi Anggaran</div>
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->
