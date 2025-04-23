<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Desa Digital</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('sneat/assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('sneat/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('sneat/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('sneat/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('sneat/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('sneat/assets/vendor/css/pages/page-auth.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('sneat/assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('sneat/assets/js/config.js') }}"></script>

    <style>
        .welcome-card {
            max-width: 500px;
            margin: 2rem auto;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        .app-brand-logo img {
            width: 60px;
            height: 60px;
            object-fit: cover;
        }
        .welcome-title {
            font-size: 2rem;
            color: #566a7f;
            margin: 1.6rem 0;
        }
        .welcome-text {
            color: #697a8d;
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }
        .auth-buttons {
            margin-top: 2rem;
        }
        .btn-login {
            padding: 0.75rem 2rem;
            font-size: 1.1rem;
        }
    </style>
</head>

<body>
    <!-- Content -->
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card welcome-card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="d-flex align-items-center mb-4">
                            <div class="app-brand-logo me-3">
                                <img src="{{ asset('sneat/assets/img/illustrations/man-with-laptop-light.png') }}"
                                    alt="Logo Desa Digital" class="rounded-circle shadow-sm">
                            </div>
                            <h1 class="mb-0 text-primary fw-semibold">Desa_Digital</h1>
                        </div>

                        <h2 class="welcome-title">Selamat Datang di Desa Digital! 👋</h2>
                        <p class="welcome-text">
                            Sistem Informasi Desa Digital untuk pengelolaan data desa yang lebih baik
                        </p>

                        <div class="auth-buttons text-center">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-login">
                                    <i class="bx bx-home-alt me-2"></i> Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary btn-login">
                                    <i class="bx bx-log-in me-2"></i> Masuk
                                </a>
                                @if (config('auth.registration_enabled'))
                                    <a href="{{ route('register') }}" class="btn btn-outline-primary btn-login ms-3">
                                        <i class="bx bx-user-plus me-2"></i> Daftar
                                    </a>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->

    <!-- Core JS -->
    <script src="{{ asset('sneat/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('sneat/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('sneat/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('sneat/assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('sneat/assets/js/main.js') }}"></script>
</body>

</html>
