@extends('layouts.guest.app')
@section('title', 'Dashboard')

@section('content')
    <div class="container mt-5 text-center">
        <h2>Selamat Datang di Dashboard</h2>

        @auth
            <p class="text-muted">Login sebagai <strong>{{ Auth::user()->name }}</strong></p>
        @else
            <p class="text-muted">Silakan login untuk mengakses data proyek & user</p>
        @endauth

        <div class="row mt-4 justify-content-center">
            <div class="col-md-4">
                <div class="card dashboard-card shadow-sm border-0 text-center p-4">
                    <h5 class="fw-bold mb-2">Kelola Proyek</h5>
                    <p class="mb-3 text-muted">Lihat dan kelola semua proyek yang sedang berjalan</p>
                    <a href="{{ route('proyek.index') }}" class="btn btn-primary">Masuk</a>
                </div>
            </div>

            <div class="row mt-4 justify-content-center">
            <div class="col-md-4">
                <div class="card dashboard-card shadow-sm border-0 text-center p-4">
                    <h5 class="fw-bold mb-2">Kelola User</h5>
                    <p class="mb-3 text-muted">Lihat dan kelola semua pengguna sistem</p>
                    <a href="{{ route('user.index') }}" class="btn btn-primary">Masuk</a>
                </div>
            </div>

        </div>
    </div>
@endsection
