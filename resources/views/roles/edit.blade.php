@extends('layouts.app')

@section('title', 'Edit Role')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Settings / Roles /</span> Edit Role
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Role</h5>
                <div class="card-body">
                    <form action="{{ route('roles.update', $role) }}" method="POST">
                        @csrf
                        @method('PUT')

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible mb-3" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="name">Role Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                    id="name" name="name" value="{{ old('name', $role->name) }}" 
                                    placeholder="Enter role name" required 
                                    {{ $role->name === 'super-admin' ? 'readonly' : '' }}/>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Permissions</label>
                            <div class="col-sm-10">
                                @error('permissions')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                
                                <div class="row">
                                    @foreach($permissions as $permission)
                                        <div class="col-md-3 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" 
                                                    name="permissions[]" value="{{ $permission->id }}"
                                                    id="permission{{ $permission->id }}"
                                                    {{ in_array($permission->id, old('permissions', $rolePermissions)) ? 'checked' : '' }}
                                                    {{ $role->name === 'super-admin' ? 'disabled' : '' }}>
                                                <label class="form-check-label" for="permission{{ $permission->id }}">
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-10 offset-sm-2">
                                @if($role->name !== 'super-admin')
                                    <button type="submit" class="btn btn-primary">Update Role</button>
                                @endif
                                <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 