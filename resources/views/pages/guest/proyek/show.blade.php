@extends('layouts.guest.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width:900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown">
                {{ $proyek->nama_proyek }}
            </h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('proyek.index') }}">Proyek</a>
                </li>
                <li class="breadcrumb-item active text-secondary">
                    Detail
                </li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Detail Start -->
    <div class="container-fluid feature bg-light py-5">
        <div class="container py-5">

            <div class="row justify-content-center">
                <div class="col-lg-10 wow fadeInUp">

                    <div class="feature-item border p-5">

                        {{-- INFORMASI PROYEK --}}
                        <h4 class="fw-bold mb-4 text-center">
                            Informasi Proyek
                        </h4>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <p><strong>Kode Proyek:</strong> {{ $proyek->kode_proyek }}</p>
                                <p><strong>Lokasi:</strong> {{ $proyek->lokasi }}</p>
                                <p><strong>Tahun:</strong> {{ $proyek->tahun }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Anggaran:</strong> {{ $proyek->anggaran }}</p>
                                <p><strong>Sumber Dana:</strong> {{ $proyek->sumber_dana }}</p>
                            </div>
                        </div>

                        <p class="mb-4">
                            {{ $proyek->deskripsi }}
                        </p>

                        <hr class="my-4">

                        {{-- DOKUMENTASI --}}
                        <h5 class="mb-3 text-center fw-bold">
                            Dokumentasi Proyek
                        </h5>

                        <div class="row g-4">
                            @foreach ($proyek->media as $media)
                                @if (Str::contains($media->mime_type, 'image'))
                                    <div class="col-md-4">
                                        <a href="{{ asset('storage/' . $media->file_name) }}" target="_blank">
                                            <img src="{{ asset('storage/' . $media->file_name) }}"
                                                class="img-fluid rounded shadow-sm">
                                        </a>
                                    </div>
                                @else
                                    <div class="col-md-4">
                                        <a href="{{ asset('storage/' . $media->file_name) }}" target="_blank"
                                            class="d-block border rounded p-4 text-center bg-white shadow-sm">
                                            <i class="fa fa-file fa-3x mb-2"></i>
                                            <p class="small mb-0">
                                                {{ basename($media->file_name) }}
                                            </p>
                                        </a>
                                    </div>
                                @endif
                            @endforeach

                        </div>

                        {{-- BUTTON --}}
                        <div class="mt-5 text-center">
                            <a href="{{ route('proyek.index') }}" class="btn btn-outline-secondary px-4">
                                <i class="fa fa-arrow-left me-1"></i>
                                Kembali
                            </a>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- Detail End -->
@endsection
