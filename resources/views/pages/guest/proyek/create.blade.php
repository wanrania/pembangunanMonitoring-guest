@extends('layouts.guest.app')

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width:900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown">
            Tambah Proyek
        </h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('proyek.index') }}">Proyek</a></li>
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

                    <h4 class="text-center mb-4 fw-bold">Form Tambah Proyek</h4>

                    <form method="POST" action="{{ route('proyek.store') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- KODE PROYEK --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Kode Proyek</label>
                            <input type="text" name="kode_proyek" class="form-control" required>
                        </div>

                        {{-- NAMA PROYEK --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Proyek</label>
                            <input type="text" name="nama_proyek" class="form-control" required>
                        </div>

                        {{-- TAHUN --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tahun</label>
                            <input type="number" name="tahun" class="form-control" required>
                        </div>

                        {{-- LOKASI --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Lokasi</label>
                            <input type="text" name="lokasi" class="form-control" required>
                        </div>

                        {{-- DESKRIPSI --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
                        </div>

                        {{-- UPLOAD MEDIA --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Dokumentasi Proyek</label>
                            <input type="file" name="media[]" class="form-control" multiple>
                        </div>

                        {{-- BUTTON --}}
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('proyek.index') }}" class="btn btn-outline-secondary">
                                Kembali
                            </a>

                            <button type="submit" class="btn btn-primary px-4">
                                Simpan
                            </button>
                        </div>

                    </form>

                </div>

            </div>
        </div>

    </div>
</div>

@endsection
