@extends('layouts.guest.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown">
                Edit Tahapan Proyek
            </h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('tahapan.index') }}">Tahapan Proyek</a>
                </li>
                <li class="breadcrumb-item active text-secondary">
                    Edit
                </li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Form Start -->
    <div class="container-fluid feature bg-light py-5">
        <div class="container py-5">

            <div class="row justify-content-center">
                <div class="col-lg-6 wow fadeInUp">

                    <div class="feature-item border p-5">

                        <h4 class="text-center mb-4 fw-bold">
                            Form Edit Tahapan Proyek
                        </h4>

                        <form method="POST" action="{{ route('tahapan.update', $tahapan->tahap_id) }}">
                            @csrf
                            @method('PUT')

                            {{-- PROYEK --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Proyek</label>
                                <select name="proyek_id" class="form-select" required>
                                    @foreach ($proyek as $p)
                                        <option value="{{ $p->proyek_id }}"
                                            {{ $tahapan->proyek_id == $p->proyek_id ? 'selected' : '' }}>
                                            {{ $p->nama_proyek }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- NAMA TAHAP --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nama Tahap</label>
                                <input type="text" name="nama_tahap" class="form-control"
                                       value="{{ $tahapan->nama_tahap }}" required>
                            </div>

                            {{-- TARGET --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Target Persentase (%)</label>
                                <input type="number" step="0.01" name="target_persen" class="form-control"
                                       value="{{ $tahapan->target_persen }}" required>
                            </div>

                            {{-- TANGGAL MULAI --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Tanggal Mulai</label>
                                <input type="date" name="tgl_mulai" class="form-control"
                                       value="{{ $tahapan->tgl_mulai }}" required>
                            </div>

                            {{-- TANGGAL SELESAI --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Tanggal Selesai</label>
                                <input type="date" name="tgl_selesai" class="form-control"
                                       value="{{ $tahapan->tgl_selesai }}" required>
                            </div>

                            {{-- BUTTONS --}}
                            <div class="d-flex justify-content-between align-items-center">

                                {{-- Update hanya untuk Admin --}}
                                @auth
                                    @if(auth()->user()->role === 'Admin')
                                        <button type="submit" class="btn btn-primary px-4">
                                            <i class="fa fa-save me-1"></i> Update
                                        </button>
                                    @else
                                        <p class="text-danger fw-semibold m-0">
                                            Anda tidak memiliki izin untuk mengubah tahapan.
                                        </p>
                                    @endif
                                @endauth

                                {{-- Kembali --}}
                                <a href="{{ route('tahapan.index') }}" class="btn btn-outline-secondary">
                                    <i class="fa fa-arrow-left me-1"></i> Kembali
                                </a>

                            </div>

                        </form>

                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- Form End -->
@endsection
