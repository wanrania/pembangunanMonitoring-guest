@extends('layouts.guest.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown">Lokasi Proyek</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active text-secondary">Lokasi Proyek</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Lokasi Proyek Start -->
    <div class="container-fluid service bg-light py-5">
        <div class="container py-5">

            {{-- FILTER + SEARCH + TAMBAH --}}
            <form method="GET" class="row g-3 align-items-end mb-5 wow fadeInUp">

                {{-- FILTER PROYEK --}}
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Filter Proyek</label>
                    <select name="proyek_id" class="form-select" onchange="this.form.submit()">
                        <option value="">Semua Proyek</option>
                        @foreach ($proyek as $p)
                            <option value="{{ $p->proyek_id }}"
                                {{ request('proyek_id') == $p->proyek_id ? 'selected' : '' }}>
                                {{ $p->nama_proyek }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- SEARCH --}}
                <div class="col-md-5">
                    <label class="form-label fw-semibold">Pencarian</label>
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari lat / lng / geojson..."
                            value="{{ request('search') }}">

                        <button class="btn btn-secondary">
                            <i class="fa fa-search"></i>
                        </button>

                        @if (request('search') || request('proyek_id'))
                            <a href="{{ route('lokasi.index') }}" class="btn btn-outline-danger">
                                Reset
                            </a>
                        @endif
                    </div>
                </div>

                {{-- BUTTON TAMBAH --}}
                <div class="col-md-3 text-md-end">
                    <label class="form-label d-block invisible">.</label>
                    <a href="{{ route('lokasi.create') }}" class="btn btn-primary px-4 w-100 w-md-auto">
                        <i class="fa fa-plus me-1"></i> Tambah Lokasi
                    </a>
                </div>

            </form>

            {{-- ALERT --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @elseif(session('update'))
                <div class="alert alert-warning">{{ session('update') }}</div>
            @elseif(session('delete'))
                <div class="alert alert-danger">{{ session('delete') }}</div>
            @endif

            {{-- CARD LOKASI --}}
            <div class="row g-4">
                @forelse ($lokasi as $i => $lok)
                    @php
                        // Ambil media pertama
                        $cover = $lok->media->first() ?? null;

                        // Path placeholder jika tidak ada gambar
                        $placeholder = asset('assets-guest/img/placeholder-lokasi.jpg');
                    @endphp

                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="{{ 0.2 + $i * 0.1 }}s">
                        <div class="service-item">

                            {{-- IMAGE --}}
                            <div class="service-img">
                                <img src="{{ $cover ? asset('storage/' . $cover->file_name) : $placeholder }}"
                                    class="img-fluid w-100" alt="Lokasi Proyek">
                            </div>

                            {{-- CONTENT --}}
                            <div class="service-content text-center p-4">
                                <div class="bg-secondary btn-xl-square mx-auto mb-3" style="width:100px;height:100px;">
                                    <i class="fas fa-map-marker-alt text-primary fa-3x"></i>
                                </div>

                                <h4 class="mb-2">{{ $lok->proyek->nama_proyek }}</h4>
                                <p class="text-white mb-3">
                                    Lat: {{ $lok->lat }} <br>
                                    Lng: {{ $lok->lng }}
                                </p>

                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('lokasi.show', $lok->lokasi_id) }}"
                                        class="btn btn-light btn-sm">Detail</a>

                                    <a href="{{ route('lokasi.edit', $lok->lokasi_id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{ route('lokasi.destroy', $lok->lokasi_id) }}" method="POST"
                                        onsubmit="return confirm('Hapus lokasi ini?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </div>

                            {{-- TITLE BAWAH --}}
                            <div class="service-tytle">
                                <div class="d-flex align-items-center ps-4 w-100">
                                    <h4>{{ $lok->proyek->nama_proyek }}</h4>
                                </div>
                                <div class="btn-xl-square bg-secondary p-4" style="width:80px;height:80px;">
                                    <i class="fas fa-map text-primary fa-2x"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <div class="alert alert-info">Belum ada data lokasi proyek.</div>
                    </div>
                @endforelse
            </div>

            {{-- PAGINATION --}}
            <div class="mt-5">
                {{ $lokasi->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>
    <!-- Lokasi Proyek End -->
@endsection
