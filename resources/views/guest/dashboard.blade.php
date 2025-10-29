@extends('layouts.guest.app')
@section('title', 'Dashboard')

@section('content')
    <div class="container mt-5 text-center">
        <h2>Selamat Datang di Dashboard</h2>

        @if (session('user'))
            <p class="text-muted">Login sebagai <strong>{{ session('user')->name }}</strong></p>
        @else
            <p class="text-muted">Silakan login untuk mengakses data proyek & user</p>
        @endif


        <div class="row mt-4 justify-content-center">
            <div class="col-md-4">
                <div class="card dashboard-card shadow-sm border-0 text-center p-4">
                    <h5 class="fw-bold mb-2">Kelola Proyek</h5>
                    <p class="mb-3 text-muted">Lihat dan kelola semua proyek yang berjalan</p>
                    <a href="{{ route('proyek.index') }}" class="btn btn-primary">Masuk</a>
                </div>
            </div>

            {{-- User (baru) --}}
            <div class="col-md-4">
                <div class="card dashboard-card shadow-sm border-0 text-center p-4">
                    <h5 class="fw-bold mb-2">Kelola User</h5>
                    <p class="mb-3 text-muted">Lihat dan kelola semua pengguna sistem</p>
                    <a href="{{ route('user.index') }}" class="btn btn-primary">Masuk</a>
                </div>
            </div>

            {{-- Warga (baru) --}}
            <div class="col-md-4">
                <div class="card dashboard-card shadow-sm border-0 text-center p-4">
                    <h5 class="fw-bold mb-2">Kelola Warga</h5>
                    <p class="mb-3 text-muted">Lihat dan kelola data warga desa</p>
                    <a href="{{ route('warga.index') }}" class="btn btn-primary">Masuk</a>
                </div>
            </div>

        </div>
    </div>
@endsection
