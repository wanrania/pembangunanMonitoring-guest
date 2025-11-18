@extends('layouts.guest.app')
@section('title', 'Dashboard')

@section('content')
<div class="container mt-5 text-center">

    {{-- Ilustrasi Header Dashboard --}}
    <div class="mb-4">
        <img src="{{ asset('assets-guest/img/dashboard-illustration.png') }}"
             alt="Dashboard Illustration"
             class="img-fluid"
             style="max-width: 350px;">
    </div>

    <h2 class="fw-bold text-primary mb-3">Selamat Datang di Dashboard</h2>

    @if (session('user'))
        <p class="text-muted">Login sebagai <strong>{{ session('user')->name }}</strong></p>
    @else
        <p class="text-muted">Silakan login untuk mengakses data proyek, user, dan warga.</p>
    @endif

    <div class="row mt-5 justify-content-center">

        {{-- Card Proyek --}}
        <div class="col-md-4 mb-4">
            <div class="card dashboard-card shadow-sm border-0 text-center p-4 h-100">
                <div class="icon-wrapper mb-3">
                    <i class="fa-solid fa-diagram-project text-primary" style="font-size: 48px;"></i>
                </div>
                <h5 class="fw-bold mb-2 text-dark">Kelola Proyek</h5>
                <p class="mb-3 text-muted">Lihat dan kelola semua proyek yang sedang berjalan</p>
                <a href="{{ route('proyek.index') }}" class="btn btn-primary">
                    <i class="fa-solid fa-right-to-bracket me-1"></i> Masuk
                </a>
            </div>
        </div>

        {{-- Card User --}}
        <div class="col-md-4 mb-4">
            <div class="card dashboard-card shadow-sm border-0 text-center p-4 h-100">
                <div class="icon-wrapper mb-3">
                    <i class="fa-solid fa-users text-success" style="font-size: 48px;"></i>
                </div>
                <h5 class="fw-bold mb-2 text-dark">Kelola User</h5>
                <p class="mb-3 text-muted">Lihat dan kelola semua pengguna sistem</p>
                <a href="{{ route('user.index') }}" class="btn btn-success">
                    <i class="fa-solid fa-right-to-bracket me-1"></i> Masuk
                </a>
            </div>
        </div>

        {{-- Card Warga --}}
        <div class="col-md-4 mb-4">
            <div class="card dashboard-card shadow-sm border-0 text-center p-4 h-100">
                <div class="icon-wrapper mb-3">
                    <i class="fa-solid fa-house-chimney-user text-warning" style="font-size: 48px;"></i>
                </div>
                <h5 class="fw-bold mb-2 text-dark">Kelola Warga</h5>
                <p class="mb-3 text-muted">Lihat dan kelola semua data warga desa</p>
                <a href="{{ route('warga.index') }}" class="btn btn-warning text-white">
                    <i class="fa-solid fa-right-to-bracket me-1"></i> Masuk
                </a>
            </div>
        </div>

        {{-- Card Lokasi Proyek --}}
        <div class="col-md-4 mb-4">
            <div class="card dashboard-card shadow-sm border-0 text-center p-4 h-100">
                <div class="icon-wrapper mb-3">
                    <i class="fa-solid fa-map-marker-alt text-info" style="font-size: 48px;"></i>
                </div>
                <h5 class="fw-bold mb-2 text-dark">Kelola Lokasi Proyek</h5>
                <p class="mb-3 text-muted">Lihat dan kelola semua lokasi proyek</p>
                <a href="{{ route('lokasi.index') }}" class="btn btn-info text-white">
                    <i class="fa-solid fa-right-to-bracket me-1"></i> Masuk
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
