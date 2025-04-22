@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Selamat Datang! 🎉</h5>
                        <p class="mb-4">
                            Anda memiliki <span class="fw-bold">{{ $totalPengaduan ?? 0 }}</span> pengaduan yang belum ditanggapi. Silakan cek menu pengaduan untuk detail lebih lanjut.
                        </p>

                        <a href="{{ route('pengaduan.index') }}" class="btn btn-sm btn-outline-primary">Lihat Pengaduan</a>
                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="{{ asset('sneat/assets/img/illustrations/man-with-laptop-light.png') }}" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png"/>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics -->
    <div class="col-lg-4 col-md-12 col-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <img src="{{ asset('sneat/assets/img/icons/unicons/users.png') }}" alt="users" class="rounded"/>
                    </div>
                </div>
                <span class="fw-semibold d-block mb-1">Total Warga</span>
                <h3 class="card-title mb-2">{{ $totalWarga ?? 0 }}</h3>
                <small class="text-success fw-semibold">
                    <i class="bx bx-up-arrow-alt"></i> +{{ $pertumbuhanWarga ?? 0 }}%
                </small>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-12 col-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <img src="{{ asset('sneat/assets/img/icons/unicons/document.png') }}" alt="documents" class="rounded"/>
                    </div>
                </div>
                <span class="fw-semibold d-block mb-1">Layanan Aktif</span>
                <h3 class="card-title mb-2">{{ $totalLayanan ?? 0 }}</h3>
                <small class="text-success fw-semibold">
                    <i class="bx bx-up-arrow-alt"></i> +{{ $pertumbuhanLayanan ?? 0 }}%
                </small>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-12 col-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <img src="{{ asset('sneat/assets/img/icons/unicons/chart.png') }}" alt="chart" class="rounded"/>
                    </div>
                </div>
                <span class="fw-semibold d-block mb-1">Potensi Desa</span>
                <h3 class="card-title mb-2">{{ $totalPotensi ?? 0 }}</h3>
                <small class="text-success fw-semibold">
                    <i class="bx bx-up-arrow-alt"></i> +{{ $pertumbuhanPotensi ?? 0 }}%
                </small>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="row">
    <!-- Pengaduan Terbaru -->
    <div class="col-md-6 col-lg-6 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">Pengaduan Terbaru</h5>
                <div class="dropdown">
                    <button class="btn p-0" type="button" id="pengaduanList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="pengaduanList">
                        <a class="dropdown-item" href="{{ route('pengaduan.index') }}">Lihat Semua</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @forelse($pengaduanTerbaru ?? [] as $pengaduan)
                <ul class="p-0 m-0">
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <img src="{{ asset('sneat/assets/img/icons/unicons/envelope.png') }}" alt="pengaduan" class="rounded"/>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">{{ $pengaduan->judul_pengaduan }}</h6>
                                <small class="text-muted">{{ $pengaduan->warga->nama_warga }}</small>
                            </div>
                            <div class="user-progress">
                                <small class="fw-semibold">{{ $pengaduan->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </li>
                </ul>
                @empty
                <p class="text-center text-muted mt-3">Tidak ada pengaduan terbaru</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Berita Terbaru -->
    <div class="col-md-6 col-lg-6 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">Berita Terbaru</h5>
                <div class="dropdown">
                    <button class="btn p-0" type="button" id="beritaList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="beritaList">
                        <a class="dropdown-item" href="{{ route('berita.index') }}">Lihat Semua</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @forelse($beritaTerbaru ?? [] as $berita)
                <ul class="p-0 m-0">
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <img src="{{ asset('sneat/assets/img/icons/unicons/news.png') }}" alt="berita" class="rounded"/>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">{{ $berita->judul_berita }}</h6>
                                <small class="text-muted">{{ $berita->penulis }}</small>
                            </div>
                            <div class="user-progress">
                                <small class="fw-semibold">{{ $berita->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </li>
                </ul>
                @empty
                <p class="text-center text-muted mt-3">Tidak ada berita terbaru</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection

@push('page-scripts')
<script>
    // Add any custom JavaScript for the dashboard here
</script>
@endpush 