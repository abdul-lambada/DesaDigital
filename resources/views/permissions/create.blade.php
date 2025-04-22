@extends('layouts.app')

@section('title', 'Create Permission')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Settings / Permissions /</span> Create Permission
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Create New Permission</h5>
                <div class="card-body">
                    <form action="{{ route('permissions.store') }}" method="POST">
                        @csrf

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible mb-3" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="name">Permission Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                    id="name" name="name" value="{{ old('name') }}" 
                                    placeholder="Enter permission name" required />
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">
                                    Permission name should be in the format: "action resource" (e.g., "create users", "edit roles")
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="guard_name">Guard Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('guard_name') is-invalid @enderror" 
                                    id="guard_name" name="guard_name" value="{{ old('guard_name', 'web') }}" 
                                    placeholder="Enter guard name" required />
                                @error('guard_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary">Create Permission</button>
                                <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 