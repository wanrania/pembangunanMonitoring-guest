@extends('layouts.auth.app')

@section('title', 'Register')

@section('content')
<div class="auth-bg d-flex align-items-center justify-content-center">

    <div class="col-md-5 col-lg-4 px-3">
        <div class="auth-glass p-4 wow fadeInUp">

            <div class="text-center mb-4">
                <img src="{{ asset('assets-guest/img/logo_vertikal.png') }}"
                     class="auth-logo mb-3">
                <h3 class="auth-title">Create Account</h3>
                <p class="auth-subtitle">Daftar akun baru</p>
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
                           placeholder="Confirm" required>
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
@endsection
