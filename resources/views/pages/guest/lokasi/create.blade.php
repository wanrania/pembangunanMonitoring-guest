@extends('layouts.guest.app')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 wow fadeInUp">

            <div class="card shadow-sm p-4">

                <h3 class="mb-4">Tambah Lokasi Proyek</h3>

                <form method="POST"
                      action="{{ route('lokasi.store') }}"
                      enctype="multipart/form-data">
                    @csrf

                    {{-- PROYEK --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Proyek</label>
                        <select name="proyek_id" class="form-select" required>
                            <option value="">-- Pilih Proyek --</option>
                            @foreach ($proyek as $p)
                                <option value="{{ $p->proyek_id }}">
                                    {{ $p->nama_proyek }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- LATITUDE & LONGITUDE --}}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Latitude</label>
                            <input type="text" name="lat" class="form-control" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Longitude</label>
                            <input type="text" name="lng" class="form-control" required>
                        </div>
                    </div>

                    {{-- GEOJSON --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">GeoJSON (opsional)</label>
                        <textarea name="geojson" class="form-control" rows="3"></textarea>
                    </div>

                    {{-- MULTIPLE IMAGE --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Foto Lokasi (bisa lebih dari satu)</label>
                        <input type="file" name="media[]" class="form-control" multiple accept="image/*">
                    </div>

                    {{-- BUTTON --}}
                    <div class="d-flex gap-3">

                        <a href="{{ route('lokasi.index') }}" class="btn btn-secondary px-5">
                            Kembali
                        </a>

                        @auth
                            @if(auth()->user()->role === 'Admin')
                                <button type="submit" class="btn btn-primary px-5">
                                    Simpan
                                </button>
                            @else
                                <p class="text-danger fw-semibold mt-2">
                                    Anda tidak memiliki izin menambah lokasi proyek.
                                </p>
                            @endif
                        @endauth

                    </div>

                </form>

            </div>

        </div>
    </div>
</div>

@endsection
