@extends('layouts.app')

@section('title', 'View Role')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Settings / Roles /</span> View Role
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Role Details</h5>
                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-sm-2 text-sm-end" for="name">Role Name</label>
                        <div class="col-sm-10">
                            <p class="form-control-plaintext">{{ $role->name }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 text-sm-end">Permissions</label>
                        <div class="col-sm-10">
                            <div class="row">
                                @forelse($role->permissions as $permission)
                                    <div class="col-auto mb-2">
                                        <span class="badge bg-label-primary">{{ $permission->name }}</span>
                                    </div>
                                @empty
                                    <div class="col">
                                        <p class="text-muted mb-0">No permissions assigned.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-10 offset-sm-2">
                            @can('edit roles')
                                @if($role->name !== 'super-admin')
                                    <a href="{{ route('roles.edit', $role) }}" class="btn btn-primary">Edit Role</a>
                                @endif
                            @endcan
                            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back to List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 