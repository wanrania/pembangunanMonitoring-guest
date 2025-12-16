@extends('layouts.guest.app')

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown">
            Tambah Tahapan Proyek
        </h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('tahapan.index') }}">Tahapan Proyek</a></li>
            <li class="breadcrumb-item active text-secondary">Tambah</li>
        </ol>
    </div>
</div>
<!-- Header End -->

<div class="container-fluid feature bg-light py-5">
    <div class="container py-5">

        <div class="row justify-content-center">
            <div class="col-lg-6 wow fadeInUp">

                <div class="feature-item border p-5">

                    <h4 class="text-center mb-4 fw-bold">Form Tambah Tahapan Proyek</h4>

                    <form method="POST" action="{{ route('tahapan.store') }}">
                        @csrf

                        {{-- PROYEK --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Proyek</label>
                            <select name="proyek_id" class="form-select" required>
                                @foreach($proyek as $p)
                                    <option value="{{ $p->proyek_id }}">{{ $p->nama_proyek }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- NAMA TAHAP --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Tahap</label>
                            <input type="text" name="nama_tahap" class="form-control"
                                   placeholder="Masukkan nama tahapan" required>
                        </div>

                        {{-- TARGET --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Target Persentase (%)</label>
                            <input type="number" step="0.01" name="target_persen" class="form-control"
                                   placeholder="Contoh: 25" required>
                        </div>

                        {{-- TANGGAL MULAI --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tanggal Mulai</label>
                            <input type="date" name="tgl_mulai" class="form-control" required>
                        </div>

                        {{-- TANGGAL SELESAI --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tanggal Selesai</label>
                            <input type="date" name="tgl_selesai" class="form-control" required>
                        </div>

                        {{-- BUTTON --}}
                        <div class="d-flex justify-content-between">

                            <a href="{{ route('tahapan.index') }}" class="btn btn-outline-secondary">
                                <i class="fa fa-arrow-left me-1"></i> Kembali
                            </a>

                            @auth
                                @if (auth()->user()->role === 'Admin')
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="fa fa-save me-1"></i> Simpan
                                    </button>
                                @else
                                    <p class="text-danger fw-semibold m-0">
                                        Anda tidak memiliki izin menambah tahapan.
                                    </p>
                                @endif
                            @endauth

                        </div>

                    </form>

                </div>

            </div>
        </div>

    </div>
</div>

@endsection
