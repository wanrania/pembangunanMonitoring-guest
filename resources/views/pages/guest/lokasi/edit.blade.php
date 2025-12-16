@extends('layouts.guest.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown">
                Edit Lokasi Proyek
            </h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('lokasi.index') }}">Lokasi Proyek</a></li>
                <li class="breadcrumb-item active text-secondary">Edit</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-9 wow fadeInUp">

                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">

                        <h3 class="mb-4">
                            Edit Lokasi — {{ $lokasi->proyek->nama_proyek ?? 'Tanpa Proyek' }}
                        </h3>

                        <form method="POST" action="{{ route('lokasi.update', $lokasi->lokasi_id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- PROYEK --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Proyek</label>
                                <select name="proyek_id" class="form-select" required>
                                    @foreach ($proyek as $p)
                                        <option value="{{ $p->proyek_id }}"
                                            {{ $lokasi->proyek_id == $p->proyek_id ? 'selected' : '' }}>
                                            {{ $p->nama_proyek }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- LAT & LNG --}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Latitude</label>
                                    <input type="text" name="lat" class="form-control"
                                           value="{{ old('lat', $lokasi->lat) }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Longitude</label>
                                    <input type="text" name="lng" class="form-control"
                                           value="{{ old('lng', $lokasi->lng) }}" required>
                                </div>
                            </div>

                            {{-- GEOJSON --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">GeoJSON (opsional)</label>
                                <textarea name="geojson" rows="3" class="form-control">{{ old('geojson', $lokasi->geojson) }}</textarea>
                            </div>

                            {{-- TAMBAH FOTO BARU --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Tambah Foto Baru (boleh lebih dari satu)</label>
                                <input type="file" name="media[]" class="form-control" multiple accept="image/*">
                                <small class="text-muted">Kosongkan jika tidak ingin menambah foto.</small>
                            </div>

                            {{-- FOTO LAMA --}}
                            <h5 class="mb-3">Foto Tersimpan</h5>
                            <div class="row g-3 mb-4">
                                @forelse ($lokasi->media as $m)
                                    <div class="col-md-3 col-6 text-center">
                                        <img src="{{ asset('storage/' . $m->file_name) }}"
                                             class="img-fluid rounded mb-2"
                                             style="max-height: 120px; object-fit: cover; width: 100%;">

                                        @auth
                                            @if(auth()->user()->role === 'Admin')
                                                <form method="POST" action="{{ route('media.destroy', $m->media_id) }}"
                                                      onsubmit="return confirm('Hapus foto ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm w-100">Hapus</button>
                                                </form>
                                            @endif
                                        @endauth
                                    </div>
                                @empty
                                    <p class="text-muted">Belum ada foto untuk lokasi ini.</p>
                                @endforelse
                            </div>

                            {{-- BUTTON --}}
                            <div class="mt-4">

                                {{-- UPDATE hanya untuk Admin --}}
                                @auth
                                    @if(auth()->user()->role === 'Admin')
                                        <button class="btn btn-warning px-5 me-2">
                                            Update
                                        </button>
                                    @else
                                        <p class="text-danger fw-semibold">
                                            Anda tidak memiliki izin untuk mengubah data ini.
                                        </p>
                                    @endif
                                @endauth

                                {{-- Tombol kembali untuk semua --}}
                                <a href="{{ route('lokasi.index') }}" class="btn btn-secondary px-5">
                                    Kembali
                                </a>

                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
