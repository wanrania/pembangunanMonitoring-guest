@extends('layouts.auth.app')

@section('title', 'Login')

@section('content')
<div class="container-fluid bg-light min-vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-6 col-lg-5 col-xl-4">
                <div class="card border-0 shadow-lg wow fadeInUp" data-wow-delay="0.2s">

                    {{-- HEADER LOGO --}}
                    <div class="card-header bg-white text-center border-0 pt-5">
                        <img
                            src="{{ asset('assets-guest/img/logo_vertikal.png') }}"
                            alt="Logo"
                            style="height: 300px;"
                            class="mb-3"
                        >
                        <h4 class="fw-bold mb-1">Selamat Datang</h4>
                        <p class="text-muted mb-0">Silakan login untuk melanjutkan</p>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body px-4 pb-5 pt-4">

                        {{-- ERROR --}}
                        @if ($errors->any())
                            <div class="alert alert-danger py-2 small">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        {{-- SUCCESS --}}
                        @if (session('success'))
                            <div class="alert alert-success py-2 small">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login.process') }}">
                            @csrf

                            {{-- EMAIL --}}
                            <div class="mb-3">
                                <label class="form-label small">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        placeholder="email@example.com"
                                        value="{{ old('email') }}"
                                        required
                                    >
                                </div>
                            </div>

                            {{-- PASSWORD --}}
                            <div class="mb-4">
                                <label class="form-label small">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                    <input
                                        type="password"
                                        name="password"
                                        class="form-control"
                                        placeholder="••••••••"
                                        required
                                    >
                                </div>
                            </div>

                            {{-- BUTTON --}}
                            <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">
                                Login
                            </button>

                        </form>
                    </div>

                    {{-- FOOTER --}}
                    <div class="card-footer bg-white text-center border-0 pb-4">
                        <small class="text-muted">
                            © {{ date('Y') }} Your Company
                        </small>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
