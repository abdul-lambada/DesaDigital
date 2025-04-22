@extends('layouts.app')

@section('title', 'Detail Data Warga')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Master Data / Data Warga /</span> Detail Data Warga
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Detail Data Warga</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <div class="row">
                                <label class="col-sm-2 text-sm-end" for="nik">NIK</label>
                                <div class="col-sm-10">
                                    <p class="form-control-plaintext">{{ $warga->nik }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 mb-3">
                            <div class="row">
                                <label class="col-sm-2 text-sm-end" for="nama">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <p class="form-control-plaintext">{{ $warga->nama }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 mb-3">
                            <div class="row">
                                <label class="col-sm-2 text-sm-end" for="tempat_lahir">Tempat Lahir</label>
                                <div class="col-sm-10">
                                    <p class="form-control-plaintext">{{ $warga->tempat_lahir }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 mb-3">
                            <div class="row">
                                <label class="col-sm-2 text-sm-end" for="tanggal_lahir">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <p class="form-control-plaintext">{{ $warga->tanggal_lahir->format('d F Y') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 mb-3">
                            <div class="row">
                                <label class="col-sm-2 text-sm-end" for="jenis_kelamin">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <p class="form-control-plaintext">
                                        {{ $warga->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 mb-3">
                            <div class="row">
                                <label class="col-sm-2 text-sm-end" for="alamat">Alamat</label>
                                <div class="col-sm-10">
                                    <p class="form-control-plaintext">{{ $warga->alamat }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 mb-3">
                            <div class="row">
                                <label class="col-sm-2 text-sm-end" for="agama">Agama</label>
                                <div class="col-sm-10">
                                    <p class="form-control-plaintext">{{ $warga->agama }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 mb-3">
                            <div class="row">
                                <label class="col-sm-2 text-sm-end" for="status_perkawinan">Status Perkawinan</label>
                                <div class="col-sm-10">
                                    <p class="form-control-plaintext">{{ $warga->status_perkawinan }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 mb-3">
                            <div class="row">
                                <label class="col-sm-2 text-sm-end" for="pekerjaan">Pekerjaan</label>
                                <div class="col-sm-10">
                                    <p class="form-control-plaintext">{{ $warga->pekerjaan }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 mb-3">
                            <div class="row">
                                <label class="col-sm-2 text-sm-end" for="kewarganegaraan">Kewarganegaraan</label>
                                <div class="col-sm-10">
                                    <p class="form-control-plaintext">{{ $warga->kewarganegaraan }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                @can('edit warga')
                                    <a href="{{ route('warga.edit', $warga) }}" class="btn btn-primary">Edit</a>
                                @endcan
                                <a href="{{ route('warga.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 