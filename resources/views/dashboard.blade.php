@extends('layouts.app')

@php
    use Illuminate\Support\Facades\Auth;
@endphp

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                        <span data-feather="calendar"></span>
                        This week
                    </button>
                </div>
            </div>

            <!-- Dashboard content -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Welcome to Desa Digital Dashboard</h5>
                        </div>
                        <div class="card-body">
                            <p>You are logged in as {{ auth()->user()->name }} with role: {{ auth()->user()->roles->first()->name }}</p>
                            <!-- Add your dashboard content here -->
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection

@push('styles')
<style>
    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 100;
        padding: 48px 0 0;
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
    }

    .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 48px);
        padding-top: .5rem;
        overflow-x: hidden;
        overflow-y: auto;
    }

    .sidebar .nav-link {
        font-weight: 500;
        color: #333;
        padding: 0.5rem 1rem;
    }

    .sidebar .nav-link.active {
        color: #2470dc;
    }

    .sidebar .nav-link:hover {
        color: #2470dc;
    }

    .sidebar .nav-link i {
        margin-right: 4px;
        color: #727272;
    }

    .sidebar .nav-link.active i {
        color: #2470dc;
    }
</style>
@endpush
