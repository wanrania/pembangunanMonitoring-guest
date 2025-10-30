@extends('layouts.guest.app')

@section('title', 'Login')

@section('content')
    <div class="login-page d-flex justify-content-center align-items-center">
        <div class="login-card">
            <h3 class="text-center mb-4 fw-semibold text-primary">Selamat Datang 👋</h3>

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control login-input" required
                        value="{{ old('email') }}">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input type="password" name="password" class="form-control login-input" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    <i class="fa-solid fa-right-to-bracket me-1"></i> Login
                </button>

            </form>

            <p class="text-center mt-3 text-muted small">
                Belum punya akun? <a href="#" class="text-primary text-decoration-none">Hubungi Admin</a>
            </p>
        </div>
    </div>
@endsection
