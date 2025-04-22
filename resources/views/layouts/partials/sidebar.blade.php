<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('sneat/assets/img/logo/logo.png') }}" alt="Logo" width="25">
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">Desa Digital</span>
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
                <div>Dashboard</div>
            </a>
        </li>

        <!-- Data Desa -->
        <li class="menu-item {{ request()->routeIs('desa.*') || request()->routeIs('pemerintahan.*') || request()->routeIs('wilayah.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-building-house"></i>
                <div>Data Desa</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('desa.*') ? 'active' : '' }}">
                    <a href="{{ route('desa.index') }}" class="menu-link">
                        <div>Profil Desa</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('pemerintahan.*') ? 'active' : '' }}">
                    <a href="{{ route('pemerintahan.index') }}" class="menu-link">
                        <div>Pemerintahan</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('wilayah.*') ? 'active' : '' }}">
                    <a href="{{ route('wilayah.index') }}" class="menu-link">
                        <div>Wilayah</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Kependudukan -->
        <li class="menu-item {{ request()->routeIs('warga.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div>Kependudukan</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('warga.*') ? 'active' : '' }}">
                    <a href="{{ route('warga.index') }}" class="menu-link">
                        <div>Data Warga</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Layanan -->
        <li class="menu-item {{ request()->routeIs('layanan.*') || request()->routeIs('pengaduan.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-server"></i>
                <div>Layanan</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('layanan.*') ? 'active' : '' }}">
                    <a href="{{ route('layanan.index') }}" class="menu-link">
                        <div>Layanan Publik</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('pengaduan.*') ? 'active' : '' }}">
                    <a href="{{ route('pengaduan.index') }}" class="menu-link">
                        <div>Pengaduan</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Informasi -->
        <li class="menu-item {{ request()->routeIs('potensi.*') || request()->routeIs('berita.*') || request()->routeIs('galeri.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-info-circle"></i>
                <div>Informasi</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('potensi.*') ? 'active' : '' }}">
                    <a href="{{ route('potensi.index') }}" class="menu-link">
                        <div>Potensi Desa</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('berita.*') ? 'active' : '' }}">
                    <a href="{{ route('berita.index') }}" class="menu-link">
                        <div>Berita</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('galeri.*') ? 'active' : '' }}">
                    <a href="{{ route('galeri.index') }}" class="menu-link">
                        <div>Galeri</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Dokumen -->
        <li class="menu-item {{ request()->routeIs('download.*') || request()->routeIs('anggaran.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-folder"></i>
                <div>Dokumen</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('download.*') ? 'active' : '' }}">
                    <a href="{{ route('download.index') }}" class="menu-link">
                        <div>Download Area</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('anggaran.*') ? 'active' : '' }}">
                    <a href="{{ route('anggaran.index') }}" class="menu-link">
                        <div>Transparansi Anggaran</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Interaksi -->
        <li class="menu-item {{ request()->routeIs('interaksi.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-chat"></i>
                <div>Interaksi</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('interaksi.*') ? 'active' : '' }}">
                    <a href="{{ route('interaksi.index') }}" class="menu-link">
                        <div>Interaksi Warga</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside> 