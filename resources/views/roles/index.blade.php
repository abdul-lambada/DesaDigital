@extends('layouts.app')

@section('title', 'Roles Management')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Settings /</span> Roles
    </h4>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Roles</h5>
            @can('create roles')
            <a href="{{ route('roles.create') }}" class="btn btn-primary">
                <i class="bx bx-plus"></i> Add Role
            </a>
            @endcan
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible mb-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible mb-3" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Permissions</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @foreach($role->permissions as $permission)
                                        <span class="badge bg-label-primary me-1">{{ $permission->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            @can('view roles')
                                            <a class="dropdown-item" href="{{ route('roles.show', $role) }}">
                                                <i class="bx bx-show-alt me-1"></i> View
                                            </a>
                                            @endcan
                                            @can('edit roles')
                                            <a class="dropdown-item" href="{{ route('roles.edit', $role) }}">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                            @endcan
                                            @can('delete roles')
                                            @if($role->name !== 'super-admin')
                                            <form action="{{ route('roles.destroy', $role) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this role?')">
                                                    <i class="bx bx-trash me-1"></i> Delete
                                                </button>
                                            </form>
                                            @endif
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
                {{ $roles->links() }}
            </div>
        </div>
    </div>
</div>
@endsection 