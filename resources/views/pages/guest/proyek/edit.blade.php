@extends('layouts.guest.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width:900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown">
                Edit Proyek
            </h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('proyek.index') }}">Proyek</a>
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
                <div class="col-lg-7 wow fadeInUp">

                    <div class="feature-item border p-5">

                        <h4 class="text-center mb-4 fw-bold">Form Edit Proyek</h4>

                        <form action="{{ route('proyek.update', $proyek->proyek_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- KODE PROYEK --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Kode Proyek</label>
                                <input type="text" name="kode_proyek" class="form-control"
                                    value="{{ old('kode_proyek', $proyek->kode_proyek) }}" required>
                            </div>

                            {{-- NAMA PROYEK --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nama Proyek</label>
                                <input type="text" name="nama_proyek" class="form-control"
                                    value="{{ old('nama_proyek', $proyek->nama_proyek) }}" required>
                            </div>

                            {{-- TAHUN --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Tahun</label>
                                <input type="number" name="tahun" class="form-control"
                                       value="{{ old('tahun', $proyek->tahun) }}" required>
                            </div>

                            {{-- LOKASI --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Lokasi</label>
                                <input type="text" name="lokasi" class="form-control"
                                       value="{{ old('lokasi', $proyek->lokasi) }}" required>
                            </div>

                            {{-- ANGGARAN --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Anggaran</label>
                                <input type="text" name="anggaran" class="form-control"
                                       value="{{ old('anggaran', $proyek->anggaran) }}" required>
                            </div>

                            {{-- SUMBER DANA --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Sumber Dana</label>
                                <input type="text" name="sumber_dana" class="form-control"
                                       value="{{ old('sumber_dana', $proyek->sumber_dana) }}">
                            </div>

                            {{-- DESKRIPSI --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" rows="4" required>{{ old('deskripsi', $proyek->deskripsi) }}</textarea>
                            </div>

                            {{-- TAMBAH MEDIA --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Tambah Dokumentasi (opsional)</label>
                                <input type="file" name="media[]" class="form-control" multiple>
                                <small class="text-muted">Bisa memilih banyak file sekaligus.</small>
                            </div>

                            {{-- BUTTON --}}
                            <div class="d-flex justify-content-between align-items-center">

                                {{-- Tombol Update hanya untuk Admin --}}
                                @auth
                                    @if(auth()->user()->role === 'Admin')
                                        <button class="btn btn-warning px-4">
                                            <i class="fa fa-save me-1"></i> Update
                                        </button>
                                    @else
                                        <p class="text-danger fw-semibold m-0">
                                            Anda tidak memiliki izin untuk memperbarui proyek.
                                        </p>
                                    @endif
                                @endauth

                                {{-- Tombol kembali untuk semua --}}
                                <a href="{{ route('proyek.index') }}" class="btn btn-outline-secondary">
                                    <i class="fa fa-arrow-left me-1"></i> Kembali
                                </a>

                            </div>

                        </form>

                        {{-- MEDIA TERSIMPAN --}}
                        <hr class="my-4">

                        <h5 class="mb-3 fw-bold">Dokumentasi Tersimpan</h5>

                        <div class="row g-3">
                            @forelse ($proyek->media as $media)
                                <div class="col-md-4">
                                    <div class="border rounded p-2 h-100 position-relative">

                                        {{-- TAMPIL GAMBAR --}}
                                        @if(Str::contains($media->mime_type, 'image'))
                                            <img src="{{ asset('storage/' . $media->file_name) }}" class="img-fluid rounded">
                                        @else
                                            <div class="text-center p-3">
                                                <i class="fa fa-file fa-3x"></i>
                                                <p class="small mt-2">{{ basename($media->file_name) }}</p>
                                            </div>
                                        @endif

                                        {{-- DELETE MEDIA --}}
                                        @auth
                                            @if(auth()->user()->role === 'Admin')
                                                <form action="{{ route('media.destroy', $media->media_id) }}"
                                                      method="POST"
                                                      class="position-absolute top-0 end-0 m-1"
                                                      onsubmit="return confirm('Hapus media ini?')">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        @endauth

                                    </div>
                                </div>
                            @empty
                                <p class="text-muted">Belum ada dokumentasi tersimpan.</p>
                            @endforelse
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- Form End -->
@endsection
