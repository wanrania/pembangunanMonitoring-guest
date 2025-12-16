@extends('layouts.guest.app')

@section('content')
    <!-- Header -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown">
                Detail Warga
            </h4>

            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('warga.index') }}">Warga</a>
                </li>
                <li class="breadcrumb-item active text-secondary">
                    Detail
                </li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <div class="container py-5">
        <div class="row justify-content-center">

            <div class="col-lg-8 wow fadeInUp">

                <div class="team-item border border-primary p-1">

                    {{-- BORDER ANIMATION --}}
                    <div class="team-border-style-1"></div>
                    <div class="team-border-style-2"></div>
                    <div class="team-border-style-3"></div>
                    <div class="team-border-style-4"></div>

                    <div class="bg-white p-4 p-md-5">

                        {{-- AVATAR --}}
                        <div class="text-center mb-4">
                            <div class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center"
                                 style="width: 130px; height: 130px; font-size: 48px; font-weight: 600;">
                                {{ strtoupper(substr($dataWarga->nama, 0, 1)) }}
                            </div>
                            <h4 class="mt-3 mb-1">{{ $dataWarga->nama }}</h4>
                            <p class="text-muted mb-0">
                                {{ $dataWarga->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                            </p>
                        </div>

                        <hr>

                        {{-- DETAIL DATA --}}
                        <div class="row g-3">

                            <div class="col-md-6">
                                <strong>No KTP</strong>
                                <p class="text-muted mb-2">{{ $dataWarga->no_ktp }}</p>
                            </div>

                            <div class="col-md-6">
                                <strong>Agama</strong>
                                <p class="text-muted mb-2">{{ $dataWarga->agama ?? '-' }}</p>
                            </div>

                            <div class="col-md-6">
                                <strong>Pekerjaan</strong>
                                <p class="text-muted mb-2">{{ $dataWarga->pekerjaan ?? '-' }}</p>
                            </div>

                            <div class="col-md-6">
                                <strong>No Telp</strong>
                                <p class="text-muted mb-2">{{ $dataWarga->telp ?? '-' }}</p>
                            </div>

                            <div class="col-md-12">
                                <strong>Email</strong>
                                <p class="text-muted mb-2">{{ $dataWarga->email ?? '-' }}</p>
                            </div>

                        </div>

                        <hr>

                        {{-- ACTION BUTTON --}}
                        <div class="text-center mt-4">
                            <a href="{{ route('warga.edit', $dataWarga->warga_id) }}"
                               class="btn btn-warning px-4 me-2">
                                <i class="fa fa-edit me-1"></i>
                                Edit
                            </a>

                            <a href="{{ route('warga.index') }}"
                               class="btn btn-secondary px-4">
                                <i class="fa fa-arrow-left me-1"></i>
                                Kembali
                            </a>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
