@extends('layouts.app')

@section('title', 'Data Warga')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Master Data /</span> Data Warga
    </h4>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data Warga</h5>
            @can('create warga')
            <a href="{{ route('warga.create') }}" class="btn btn-primary">
                <i class="bx bx-plus"></i> Tambah Warga
            </a>
            @endcan
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($warga as $w)
                            <tr>
                                <td>{{ $w->nik }}</td>
                                <td>{{ $w->nama }}</td>
                                <td>{{ $w->tempat_lahir }}, {{ $w->tanggal_lahir->format('d/m/Y') }}</td>
                                <td>{{ $w->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td>{{ $w->alamat }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            @can('view warga')
                                            <a class="dropdown-item" href="{{ route('warga.show', $w) }}">
                                                <i class="bx bx-show-alt me-1"></i> Detail
                                            </a>
                                            @endcan
                                            @can('edit warga')
                                            <a class="dropdown-item" href="{{ route('warga.edit', $w) }}">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                            @endcan
                                            @can('delete warga')
                                            <form action="{{ route('warga.destroy', $w) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <i class="bx bx-trash me-1"></i> Delete
                                                </button>
                                            </form>
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
                {{ $warga->links() }}
            </div>
        </div>
    </div>
</div>
@endsection 