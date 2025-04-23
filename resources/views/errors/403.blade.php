@extends('layouts.guest')

@section('content')
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Error -->
            <div class="card">
                <div class="card-body">
                    <div class="misc-wrapper">
                        <h2 class="mb-2 mx-2">Akses Ditolak!</h2>
                        <p class="mb-4 mx-2">Maaf, Anda tidak memiliki izin untuk mengakses halaman ini.</p>
                        <div class="d-flex justify-content-center mt-3">
                            <img src="{{ asset('sneat/assets/img/illustrations/page-misc-error-light.png') }}" alt="page-misc-error-light" width="400" class="img-fluid" data-app-dark-img="illustrations/page-misc-error-dark.png" data-app-light-img="illustrations/page-misc-error-light.png">
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Error -->
        </div>
    </div>
</div>
@endsection