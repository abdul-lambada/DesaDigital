@extends('layouts.app')

@section('title', 'Daftar Pengguna')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">User Management /</span> Daftar Pengguna
    </h4>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Pengguna</h5>
            <a href="{{ route('users.create') }}" class="btn btn-primary">
                <i class="bx bx-plus me-1"></i> Tambah Pengguna
            </a>
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
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @foreach($user->roles as $role)
                                        <span class="badge bg-label-primary">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->id }}">
                                                <i class="bx bx-trash me-1"></i> Hapus
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>

@foreach($users as $user)
<x-delete-modal
    id="deleteModal{{ $user->id }}"
    title="Konfirmasi Hapus"
    message="Apakah Anda yakin ingin menghapus pengguna {{ $user->name }}?"
    deleteUrl="{{ route('users.destroy', $user->id) }}"
/>
@endforeach
@endsection
