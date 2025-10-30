@extends('layouts.guest.app')

@section('title', 'Tentang Aplikasi')

@section('content')
    <div class="container mt-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary">
                <i class="fa-solid fa-info-circle me-2"></i> Tentang Aplikasi Monitoring Proyek
            </h2>
            <p class="text-muted">Menjaga transparansi, efisiensi, dan kemudahan dalam pengelolaan data proyek.</p>
        </div>

        <div class="row align-items-center">
            <div class="col-md-6 mb-4">
                <img src="{{ asset('assets-guest/img/about-illustration.png') }}" alt="Tentang Kami"
                    class="img-fluid rounded shadow">
            </div>
            <div class="col-md-6">
                <h4 class="fw-semibold mb-3">Tujuan Aplikasi</h4>
                <p>
                    Aplikasi <strong>Monitoring Proyek</strong> ini dibuat untuk membantu dalam pengawasan, pencatatan, dan
                    pelaporan proyek pembangunan secara terstruktur dan efisien.
                    Dengan sistem ini, pengguna dapat dengan mudah menambahkan, mengedit, dan memantau data proyek, warga,
                    serta pengguna sistem.
                </p>

                <h4 class="fw-semibold mt-4 mb-3">Alur Penggunaan</h4>
                <ul>
                    <li>Admin melakukan login untuk mengakses dashboard utama.</li>
                    <li>Admin dapat menambahkan data proyek, warga, dan user.</li>
                    <li>Semua data tersimpan otomatis dan bisa diperbarui kapan saja.</li>
                    <li>Guest dapat melihat informasi umum melalui halaman ini.</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
