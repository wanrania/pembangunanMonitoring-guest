@extends('layouts.guest.app')

@section('content')

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown">Detail Progres Proyek</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('progres.index') }}">Progres Proyek</a></li>
                <li class="breadcrumb-item active text-secondary">Detail</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Detail Progres Start -->
    <div class="container py-5">

        <div class="row g-5">

            {{-- INFO UTAMA --}}
            <div class="col-lg-8 wow fadeInUp">

                <div class="project-item p-4 h-100">

                    <p class="fs-5 text-secondary mb-1">
                        {{ $data->tahap->nama_tahap }}
                    </p>

                    <h2 class="mb-3">
                        {{ $data->proyek->nama_proyek }}
                    </h2>

                    {{-- PROGRESS BAR --}}
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="fw-bold">Progres</span>
                            <span class="fw-bold">{{ $data->persen_real }}%</span>
                        </div>

                        <div class="progress" style="height: 12px;">
                            <div class="progress-bar bg-primary" role="progressbar"
                                style="width: {{ $data->persen_real }}%">
                            </div>
                        </div>
                    </div>

                    <p>
                        <strong>Tanggal Update:</strong>
                        {{ \Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y') }}
                    </p>

                    <p class="text-muted mt-3">
                        {{ $data->catatan ?: 'Tidak ada catatan progres.' }}
                    </p>

                    {{-- ACTION --}}
                    <div class="mt-4 d-flex gap-2 flex-wrap">
                        <a href="{{ route('progres.edit', $data->progres_id) }}" class="btn btn-warning">
                            Edit
                        </a>

                        <form action="{{ route('progres.destroy', $data->progres_id) }}" method="POST"
                            onsubmit="return confirm('Hapus progres ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">
                                Hapus
                            </button>
                        </form>

                        <a href="{{ route('progres.index') }}" class="btn btn-secondary">
                            Kembali
                        </a>
                    </div>

                </div>

            </div>

            {{-- SIDEBAR / MEDIA --}}
            <div class="col-lg-4 wow fadeInUp">

                <div class="project-item p-3">

                    <h5 class="mb-3">Dokumentasi Progres</h5>

                    @if ($data->media->count())
                        <div class="row g-2">
                            @foreach ($data->media as $m)
                                <div class="col-6">
                                    <a href="{{ asset('storage/' . $m->file_name) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $m->file_name) }}" class="img-fluid rounded">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted">Belum ada dokumentasi.</p>
                    @endif


                </div>

            </div>

        </div>

    </div>
    <!-- Detail Progres End -->

@endsection
