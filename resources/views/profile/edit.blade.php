@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Account Settings /</span> Profile
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <!-- Profile Details -->
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="card mb-4">
                <!-- Change Password -->
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="card">
                <!-- Delete Account -->
                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
