<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" width="40">
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
        <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Data Desa -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Data Desa</span>
        </li>
        <li class="menu-item {{ request()->routeIs('desa.*') ? 'active' : '' }}">
            <a href="{{ route('desa.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-building-house"></i>
                <div data-i18n="Profil Desa">Profil Desa</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('pemerintahan.*') ? 'active' : '' }}">
            <a href="{{ route('pemerintahan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Pemerintahan">Pemerintahan</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('wilayah.*') ? 'active' : '' }}">
            <a href="{{ route('wilayah.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-map-alt"></i>
                <div data-i18n="Wilayah">Wilayah</div>
            </a>
        </li>

        <!-- Kependudukan -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Kependudukan</span>
        </li>
        <li class="menu-item {{ request()->routeIs('warga.*') ? 'active' : '' }}">
            <a href="{{ route('warga.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Data Warga">Data Warga</div>
            </a>
        </li>

        <!-- Layanan -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Layanan</span>
        </li>
        <li class="menu-item {{ request()->routeIs('layanan.*') ? 'active' : '' }}">
            <a href="{{ route('layanan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-server"></i>
                <div data-i18n="Layanan Publik">Layanan Publik</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('pengaduan.*') ? 'active' : '' }}">
            <a href="{{ route('pengaduan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-envelope"></i>
                <div data-i18n="Pengaduan">Pengaduan</div>
            </a>
        </li>

        <!-- Informasi -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Informasi</span>
        </li>
        <li class="menu-item {{ request()->routeIs('potensi.*') ? 'active' : '' }}">
            <a href="{{ route('potensi.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-chart"></i>
                <div data-i18n="Potensi Desa">Potensi Desa</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('berita.*') ? 'active' : '' }}">
            <a href="{{ route('berita.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-news"></i>
                <div data-i18n="Berita">Berita</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('galeri.*') ? 'active' : '' }}">
            <a href="{{ route('galeri.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-image"></i>
                <div data-i18n="Galeri">Galeri</div>
            </a>
        </li>

        <!-- Dokumen -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Dokumen</span>
        </li>
        <li class="menu-item {{ request()->routeIs('download.*') ? 'active' : '' }}">
            <a href="{{ route('download.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-download"></i>
                <div data-i18n="Download Area">Download Area</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('anggaran.*') ? 'active' : '' }}">
            <a href="{{ route('anggaran.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-money"></i>
                <div data-i18n="Transparansi Anggaran">Transparansi Anggaran</div>
            </a>
        </li>

        <!-- Interaksi -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Interaksi</span>
        </li>
        <li class="menu-item {{ request()->routeIs('interaksi.*') ? 'active' : '' }}">
            <a href="{{ route('interaksi.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-conversation"></i>
                <div data-i18n="Forum Warga">Forum Warga</div>
            </a>
        </li>
    </ul>
</aside> 