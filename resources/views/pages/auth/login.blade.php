@extends('layouts.auth.app')

@section('title', 'Login')

@section('content')
    <div class="auth-bg">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11 col-xl-10">

                    <!-- WRAPPER 2 KOLOM -->
                    <div class="auth-wrapper">

                        <!-- KIRI : ILLUSTRASI -->
                        <div class="auth-illustration d-none d-lg-flex">
                            <div class="illustration-card">

                                <span class="illustration-badge">
                                    <i class="bi bi-bar-chart-line-fill me-1"></i>
                                    Monitoring Proyek
                                </span>

                                <h3 class="fw-bold mb-3">PROJEKTA</h3>

                                <p class="mb-4">
                                    Platform <strong>Monitoring & Manajemen Proyek</strong>
                                    untuk transparansi pembangunan dan pengambilan keputusan berbasis data.
                                </p>

                                <ul class="list-unstyled illustration-list">
                                    <li>
                                        <i class="bi bi-check-circle-fill"></i>
                                        Progres proyek real-time
                                    </li>
                                    <li>
                                        <i class="bi bi-check-circle-fill"></i>
                                        Data terstruktur & terintegrasi
                                    </li>
                                    <li>
                                        <i class="bi bi-check-circle-fill"></i>
                                        Transparan & akuntabel
                                    </li>
                                </ul>

                            </div>
                        </div>



                        <!-- KANAN : FORM LOGIN -->
                        <div class="auth-form">

                            <span class="auth-badge">
                                <i class="bi bi-shield-lock-fill me-1"></i> Secure Login
                            </span>

                            <div class="text-center mb-4">
                                <img src="{{ asset('assets-guest/img/logo_vertikal.png') }}" class="auth-logo mb-3">
                                <h4 class="fw-bold mb-1">Welcome Back</h4>
                                <p class="text-muted small">Silakan login untuk melanjutkan</p>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger small">
                                    {{ $errors->first() }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('login.process') }}">
                                @csrf

                                <div class="form-floating mb-3 position-relative">
                                    <i class="bi bi-envelope input-icon"></i>
                                    <input type="email" name="email" class="form-control auth-input" placeholder="Email"
                                        required>
                                    <label>Email</label>
                                </div>

                                <div class="form-floating mb-3 position-relative">
                                    <i class="bi bi-lock input-icon"></i>
                                    <input type="password" name="password" id="password" class="form-control auth-input"
                                        placeholder="Password" required>
                                    <label>Password</label>

                                    <span class="password-toggle" onclick="togglePassword()">
                                        <i class="bi bi-eye" id="toggleIcon"></i>
                                    </span>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember">
                                        <label class="form-check-label small">Remember me</label>
                                    </div>
                                    <a href="#" class="small text-muted">Forgot Password?</a>
                                </div>

                                <button type="submit" class="btn btn-auth w-100 text-white">
                                    Login
                                </button>
                            </form>

                            <div class="divider">atau</div>

                            <button class="btn btn-social btn-google w-100 mb-2">
                                <i class="fab fa-google me-2"></i> Continue with Google
                            </button>

                            <button class="btn btn-social btn-apple w-100 mb-2">
                                <i class="fab fa-apple me-2"></i> Continue with Apple
                            </button>

                            <div class="text-center mt-3 small">
                                Belum punya akun?
                                <a href="{{ route('register') }}" class="fw-semibold">Register</a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const icon = document.getElementById('toggleIcon');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            }
        }
    </script>
@endsection
