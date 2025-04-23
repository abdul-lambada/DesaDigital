@extends('layouts.app')

@section('title', 'Data Desa')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Data Master /</span> Data Desa
        </h4>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Daftar Desa</h5>
                @can('create desa')
                    <a href="{{ route('desa.create') }}" class="btn btn-primary">
                        <i class="bx bx-plus me-1"></i> Tambah Desa
                    </a>
                @endcan
            </div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Desa</th>
                                <th>Kode Desa</th>
                                <th>Kecamatan</th>
                                <th>Kabupaten</th>
                                <th>Provinsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($desas as $key => $desa)
                                <tr>
                                    <td>{{ $desas->firstItem() + $key }}</td>
                                    <td>{{ $desa->nama_desa }}</td>
                                    <td>{{ $desa->kode_desa }}</td>
                                    <td>{{ $desa->kecamatan }}</td>
                                    <td>{{ $desa->kabupaten }}</td>
                                    <td>{{ $desa->provinsi }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                @can('view desa')
                                                    <a class="dropdown-item" href="{{ route('desa.show', $desa) }}">
                                                        <i class="bx bx-show me-1"></i> Lihat
                                                    </a>
                                                @endcan
                                                @can('edit desa')
                                                    <a class="dropdown-item" href="{{ route('desa.edit', $desa) }}">
                                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                                    </a>
                                                @endcan
                                                @can('delete desa')
                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $desa->id_desa }}">
                                                        <i class="bx bx-trash me-1"></i> Hapus
                                                    </button>
                                                @endcan
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-muted">
                            Menampilkan {{ $desas->firstItem() }} sampai {{ $desas->lastItem() }} dari
                            {{ $desas->total() }} data
                        </div>
                        <div>
                            {{ $desas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($desas as $desa)
        <x-delete-modal id="deleteModal{{ $desa->id_desa }}" title="Konfirmasi Hapus Desa"
            message="Apakah Anda yakin ingin menghapus data desa ini?" formId="deleteForm{{ $desa->id_desa }}" />
    @endforeach

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                window.confirmDelete = function(url) {
                    const form = document.getElementById('deleteForm');
                    if (form) {
                        form.action = url;
                        const modalElement = document.getElementById('deleteModal');
                        if (modalElement) {
                            const modal = new bootstrap.Modal(modalElement);
                            modal.show();
                        }
                    }
                };
            });
        </script>
    @endpush
@endsection
