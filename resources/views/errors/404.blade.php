@extends('layouts.guest')

@section('content')
    <div class="container-xxl container-p-y d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 100px);">
        <div class="misc-wrapper text-center">
            <h2 class="mb-2">Halaman Tidak Ditemukan :(</h2>
            <p class="mb-4">Oops! 😖 Halaman yang Anda cari tidak dapat ditemukan.</p>
            <div class="mt-3">
                <img src="{{ asset('sneat/assets/img/illustrations/page-misc-error-light.png') }}" alt="page-misc-error-light" width="500" class="img-fluid" data-app-dark-img="illustrations/page-misc-error-dark.png" data-app-light-img="illustrations/page-misc-error-light.png" />
            </div>
            <div class="mt-4">
                <a href="{{ url('/dashboard') }}" class="btn btn-primary">Kembali ke Beranda</a>
            </div>
        </div>
    </div>
@endsection
