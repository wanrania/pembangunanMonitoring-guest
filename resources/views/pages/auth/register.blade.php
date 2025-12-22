@extends('layouts.auth.app')

@section('title', 'Register')

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
                                <i class="bi bi-person-plus-fill me-1"></i>
                                Registrasi Akun
                            </span>

                            <h3 class="fw-bold mb-3">PROJEKTA</h3>

                            <p class="mb-4">
                                Buat akun untuk mengakses <strong>Sistem Monitoring &
                                Manajemen Proyek</strong> secara terintegrasi.
                            </p>

                            <ul class="list-unstyled illustration-list">
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Akses data proyek
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Monitoring progres
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Transparan & akuntabel
                                </li>
                            </ul>

                        </div>
                    </div>

                    <!-- KANAN : FORM REGISTER -->
                    <div class="auth-form">

                        <span class="auth-badge">
                            <i class="bi bi-shield-check me-1"></i> Secure Register
                        </span>

                        <div class="text-center mb-4">
                            <img src="{{ asset('assets-guest/img/logo_vertikal.png') }}"
                                 class="auth-logo mb-3">
                            <h4 class="fw-bold mb-1">Create Account</h4>
                            <p class="text-muted small">Daftar akun baru</p>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger small">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register.process') }}">
                            @csrf

                            <div class="form-floating mb-3 position-relative">
                                <i class="bi bi-person input-icon"></i>
                                <input type="text" name="name"
                                       class="form-control auth-input"
                                       placeholder="Nama" required>
                                <label>Nama</label>
                            </div>

                            <div class="form-floating mb-3 position-relative">
                                <i class="bi bi-envelope input-icon"></i>
                                <input type="email" name="email"
                                       class="form-control auth-input"
                                       placeholder="Email" required>
                                <label>Email</label>
                            </div>

                            <div class="form-floating mb-3 position-relative">
                                <i class="bi bi-lock input-icon"></i>
                                <input type="password" name="password"
                                       class="form-control auth-input"
                                       placeholder="Password" required>
                                <label>Password</label>
                            </div>

                            <div class="form-floating mb-4 position-relative">
                                <i class="bi bi-shield-lock input-icon"></i>
                                <input type="password" name="password_confirmation"
                                       class="form-control auth-input"
                                       placeholder="Konfirmasi" required>
                                <label>Konfirmasi Password</label>
                            </div>

                            <button class="btn btn-auth text-white w-100">
                                Register
                            </button>
                        </form>

                        <div class="text-center mt-3 small">
                            Sudah punya akun?
                            <a href="{{ route('login') }}" class="fw-semibold">Login</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
