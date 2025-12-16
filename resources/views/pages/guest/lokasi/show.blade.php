@extends('layouts.guest.app')

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown">
            Detail Lokasi Proyek
        </h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('lokasi.index') }}">Lokasi Proyek</a></li>
            <li class="breadcrumb-item active text-secondary">Detail</li>
        </ol>
    </div>
</div>
<!-- Header End -->

<div class="container py-5">
    <div class="row justify-content-center wow fadeInUp">
        <div class="col-lg-9">

            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-md-5">

                    {{-- JUDUL --}}
                    <h3 class="mb-1">
                        {{ $lokasi->proyek->nama_proyek ?? 'Lokasi Proyek' }}
                    </h3>
                    <p class="text-muted mb-4">
                        ID Lokasi: {{ $lokasi->lokasi_id }}
                    </p>

                    {{-- DETAIL KOORDINAT --}}
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <strong>Latitude</strong>
                            <p class="mb-0">{{ $lokasi->lat }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Longitude</strong>
                            <p class="mb-0">{{ $lokasi->lng }}</p>
                        </div>
                    </div>

                    {{-- GEOJSON --}}
                    @if ($lokasi->geojson)
                        <div class="mb-4">
                            <strong>GeoJSON</strong>
                            <pre class="bg-light p-3 rounded small mb-0" style="white-space: pre-wrap;">
{{ $lokasi->geojson }}
                            </pre>
                        </div>
                    @endif

                    <hr>

                    {{-- GALERI FOTO --}}
                    <h4 class="mb-3">Galeri Lokasi</h4>

                    <div class="row g-3 mb-4">
                        @forelse ($lokasi->media as $m)
                            <div class="col-md-4 col-6">
                                <img src="{{ asset('storage/'.$m->file_name) }}"
                                     class="img-fluid rounded shadow-sm"
                                     style="width: 100%; height: 180px; object-fit: cover;">
                            </div>
                        @empty
                            <p class="text-muted">Belum ada foto untuk lokasi ini.</p>
                        @endforelse
                    </div>

                    {{-- BUTTON --}}
                    <div class="mt-3">
                        <a href="{{ route('lokasi.edit', $lokasi->lokasi_id) }}"
                           class="btn btn-warning me-2">
                            Edit
                        </a>
                        <a href="{{ route('lokasi.index') }}"
                           class="btn btn-secondary">
                            Kembali
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
