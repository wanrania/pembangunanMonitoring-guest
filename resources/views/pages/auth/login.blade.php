@extends('layouts.auth.app')

@section('title', 'Login')

@section('content')
<div class="auth-bg d-flex align-items-center justify-content-center position-relative">

    {{-- SVG BACKGROUND --}}
    <div class="auth-svg position-absolute w-100 h-100">
        <svg viewBox="0 0 1440 900" preserveAspectRatio="xMidYMid slice">
            <defs>
                <linearGradient id="authGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="var(--bs-primary)" />
                    <stop offset="100%" stop-color="var(--bs-secondary)" />
                </linearGradient>
            </defs>

            <path opacity="0.35"
                  d="M0,350 C200,300 350,450 550,420 C750,380 850,200 1100,220 L1100,0 L0,0 Z"
                  fill="url(#authGrad)" />

            <path opacity="0.25"
                  d="M1440,520 C1200,650 980,520 820,580 C620,650 560,800 1440,900 Z"
                  fill="url(#authGrad)" />
        </svg>
    </div>

    {{-- LOGIN CARD --}}
    <div class="col-md-5 col-lg-4 px-3 position-relative" style="z-index:1;">
        <div class="auth-glass p-4 wow fadeInUp">

            {{-- HEADER --}}
            <div class="text-center mb-4">
                <img src="{{ asset('assets-guest/img/logo_vertikal.png') }}"
                     class="auth-logo mb-3">
                <h3 class="auth-title">Welcome Back</h3>
                <p class="auth-subtitle">Login untuk melanjutkan</p>
            </div>

            {{-- ERROR --}}
            @if ($errors->any())
                <div class="alert alert-danger small">
                    {{ $errors->first() }}
                </div>
            @endif

            {{-- FORM --}}
            <form method="POST" action="{{ route('login.process') }}">
                @csrf

                {{-- EMAIL --}}
                <div class="form-floating mb-3 position-relative">
                    <i class="bi bi-envelope input-icon"></i>
                    <input type="email"
                           name="email"
                           id="email"
                           class="form-control auth-input"
                           placeholder="Email"
                           required>
                    <label>Email</label>
                </div>

                {{-- PASSWORD --}}
                <div class="form-floating mb-2 position-relative">
                    <i class="bi bi-lock input-icon"></i>
                    <input type="password"
                           name="password"
                           id="password"
                           class="form-control auth-input"
                           placeholder="Password"
                           required>
                    <label>Password</label>

                    {{-- TOGGLE EYE --}}
                    <span class="password-toggle" onclick="togglePassword()">
                        <i class="bi bi-eye" id="toggleIcon"></i>
                    </span>
                </div>

                {{-- REMEMBER + FORGOT --}}
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input"
                               type="checkbox"
                               name="remember"
                               id="remember">
                        <label class="form-check-label small" for="remember">
                            Remember me
                        </label>
                    </div>

                    <a href="#" class="small text-muted">Forgot Password?</a>
                </div>

                {{-- LOGIN BUTTON --}}
                <button type="submit" class="btn btn-auth w-100 text-white">
                    Login
                </button>
            </form>

            {{-- DIVIDER --}}
            <div class="divider">or</div>

            {{-- SOCIAL --}}
            <button class="btn btn-social-icon btn-google w-100 mb-2">
                <i class="fab fa-google"></i>
                Continue with Google
            </button>

            <button class="btn btn-social-icon btn-apple w-100 mb-2">
                <i class="fab fa-apple"></i>
                Continue with Apple
            </button>

            {{-- EMAIL CTA --}}
            <button type="button"
                    class="btn btn-outline-secondary btn-social w-100"
                    onclick="document.getElementById('email').focus()">
                <i class="bi bi-envelope me-2"></i>
                Continue with Email
            </button>

            {{-- FOOTER --}}
            <div class="text-center mt-3 small">
                Belum punya akun?
                <a href="{{ route('register') }}" class="fw-semibold">Register</a>
            </div>

        </div>
    </div>

</div>

{{-- TOGGLE PASSWORD SCRIPT --}}
<script>
function togglePassword() {
    const password = document.getElementById('password');
    const icon = document.getElementById('toggleIcon');

    if (password.type === 'password') {
        password.type = 'text';
        icon.classList.replace('bi-eye', 'bi-eye-slash');
    } else {
        password.type = 'password';
        icon.classList.replace('bi-eye-slash', 'bi-eye');
    }
}
</script>
@endsection
