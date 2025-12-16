@extends('layouts.guest.app')

@section('title', 'Tentang Aplikasi')

@section('content')

<div class="container-fluid about py-5">
    <div class="container py-5">

        <div class="row g-5 align-items-center">

            <!-- LEFT IMAGES -->
            <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.1s">
                <div class="about-item-image d-flex">
                    <img src="{{ asset('assets-guest/img/about.jpg') }}" class="img-1 img-fluid w-50" alt="">
                    <img src="{{ asset('assets-guest/img/about-3.jpg') }}" class="img-2 img-fluid w-50" alt="">

                    <div class="about-item-image-content">
                        <img src="{{ asset('assets-guest/img/about-1.jpg') }}" class="img-fluid w-100 h-100"
                             style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>

            <!-- RIGHT CONTENT -->
            <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.1s">
                <div class="about-item-content">

                    <p class="text-uppercase text-secondary fs-5 mb-0">
                        Tentang Sistem Monitoring Proyek
                    </p>

                    <h2 class="display-4 text-capitalize mb-3">
                        Mendukung Transparansi dan Pengawasan Pembangunan
                    </h2>

                    <p class="mb-4 fs-5">
                        Sistem ini dirancang untuk membantu proses pemantauan, pelaporan, dan evaluasi
                        kemajuan proyek pembangunan secara lebih efektif dan akuntabel. Dengan integrasi data lokasi,
                        progres pekerjaan, dokumentasi, serta informasi kontraktor, aplikasi ini mempermudah instansi
                        dalam memastikan setiap proyek berjalan sesuai rencana.
                    </p>

                    <div class="pb-4 mb-4 border-bottom">
                        <div class="row g-4">

                            <div class="col-lg-4">
                                <div class="about-item-content-img">
                                    <img src="{{ asset('assets-guest/img/about-2.jpg') }}"
                                         class="img-fluid w-100" alt="">
                                </div>
                            </div>

                            <div class="col-lg-8">

                                <div class="d-flex mb-4">
                                    <div class="text-secondary">
                                        <i class="fas fa-user-shield fa-3x"></i>
                                    </div>
                                    <h4 class="ms-3">Standar Keamanan & Integritas Data</h4>
                                </div>

                                <div class="d-flex">
                                    <div class="text-secondary">
                                        <i class="fas fa-users-cog fa-3x"></i>
                                    </div>
                                    <h4 class="ms-3">Tim Pengelola Tersertifikasi</h4>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row gy-0 gx-4 justify-content-between pb-4">
                        <div class="col-lg-6">
                            <p class="text-dark">
                                <i class="fas fa-check text-secondary me-1"></i> Monitoring Real-time
                            </p>
                            <p class="text-dark">
                                <i class="fas fa-check text-secondary me-1"></i> Laporan Akurat & Terstruktur
                            </p>
                        </div>

                        <div class="col-lg-6">
                            <p class="text-dark">
                                <i class="fas fa-check text-secondary me-1"></i> Efisiensi Administratif
                            </p>
                            <p class="text-dark mb-0">
                                <i class="fas fa-check text-secondary me-1"></i> Pengelolaan Proyek yang Transparan
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>

@endsection
