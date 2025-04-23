@extends('layouts.app')

@section('title', 'Detail Desa')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-12">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="card-title text-primary">Detail Desa</h5>
                                    <div class="d-flex">
                                        <a href="{{ route('desa.edit', $desa->id_desa) }}" class="btn btn-warning me-2">
                                            <i class="bx bx-edit"></i> Edit
                                        </a>
                                        <a href="{{ route('desa.index') }}" class="btn btn-secondary">
                                            <i class="bx bx-arrow-back"></i> Kembali
                                        </a>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Nama Desa</label>
                                            <p>{{ $desa->nama_desa }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Kode Desa</label>
                                            <p>{{ $desa->kode_desa }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Kecamatan</label>
                                            <p>{{ $desa->kecamatan }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Kabupaten</label>
                                            <p>{{ $desa->kabupaten }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Provinsi</label>
                                            <p>{{ $desa->provinsi }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Alamat</label>
                                            <p>{{ $desa->alamat }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Telepon</label>
                                            <p>{{ $desa->telepon ?? '-' }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Email</label>
                                            <p>{{ $desa->email ?? '-' }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Website</label>
                                            <p>{{ $desa->website ?? '-' }}</p>
                                        </div>
                                    </div>
                                </div>

                                @if($desa->visi || $desa->misi)
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Visi</label>
                                            <p>{{ $desa->visi ?? '-' }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Misi</label>
                                            <p>{{ $desa->misi ?? '-' }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if($desa->sejarah || $desa->geografis || $desa->demografis)
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Sejarah</label>
                                            <p>{{ $desa->sejarah ?? '-' }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Geografis</label>
                                            <p>{{ $desa->geografis ?? '-' }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Demografis</label>
                                            <p>{{ $desa->demografis ?? '-' }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
