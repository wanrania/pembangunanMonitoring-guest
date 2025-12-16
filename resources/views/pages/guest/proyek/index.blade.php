@extends('layouts.guest.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown">Daftar Proyek</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active text-secondary">
                    Daftar Proyek
                </li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Feature Start -->
    <div class="container-fluid feature bg-light py-5">
        <div class="container py-5">

            {{-- JUDUL --}}
            <div class="text-center mx-auto pb-4 wow fadeInUp" style="max-width:800px;">
                <p class="text-uppercase text-secondary fs-5 mb-0">
                    Monitoring
                </p>
                <h2 class="display-4 text-capitalize mb-3">
                    Daftar Proyek
                </h2>
            </div>

            {{-- FILTER + SEARCH + TAMBAH --}}
            <div class="row align-items-end mb-5 wow fadeInUp">

                {{-- FILTER + SEARCH --}}
                <div class="col-lg-8">
                    <form method="GET">
                        <div class="row g-2">

                            {{-- FILTER SUMBER DANA --}}
                            <div class="col-md-4">
                                <select name="sumber_dana" class="form-select" onchange="this.form.submit()">
                                    <option value="">Semua Sumber Dana</option>
                                    <option value="APBN" {{ request('sumber_dana') == 'APBN' ? 'selected' : '' }}>APBN
                                    </option>
                                    <option value="APBD" {{ request('sumber_dana') == 'APBD' ? 'selected' : '' }}>APBD
                                    </option>
                                    <option value="Dana Desa" {{ request('sumber_dana') == 'Dana Desa' ? 'selected' : '' }}>
                                        Dana
                                        Desa</option>
                                    <option value="CSR" {{ request('sumber_dana') == 'CSR' ? 'selected' : '' }}>CSR
                                    </option>
                                </select>
                            </div>

                            {{-- SEARCH --}}
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Cari proyek..."
                                        value="{{ request('search') }}">

                                    <button class="btn btn-secondary">
                                        <i class="fa fa-search"></i>
                                    </button>

                                    @if (request('search') || request('sumber_dana'))
                                        <a href="{{ route('proyek.index') }}" class="btn btn-outline-danger">
                                            Reset
                                        </a>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </form>
                </div>

                {{-- BUTTON TAMBAH --}}
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <a href="{{ route('proyek.create') }}" class="btn btn-primary px-4">
                        <i class="fa fa-plus me-1"></i>
                        Tambah Proyek
                    </a>
                </div>

            </div>

            {{-- ALERT --}}
            @if (session('success'))
                <div class="alert alert-success wow fadeInUp">
                    {{ session('success') }}
                </div>
            @elseif(session('update'))
                <div class="alert alert-warning wow fadeInUp">
                    {{ session('update') }}
                </div>
            @elseif(session('delete'))
                <div class="alert alert-danger wow fadeInUp">
                    {{ session('delete') }}
                </div>
            @endif

            {{-- LIST PROYEK --}}
            <div class="row g-4">
                @forelse($dataProyek as $proyek)
                    <div class="col-lg-4 wow fadeInUp">
                        <div class="feature-item border p-3 h-100">

                            {{-- GAMBAR COVER --}}
                            @php
                                $cover = $proyek->media->first() ?? null;
                                $placeholder = asset('assets-guest/img/placeholder-proyek.jpg');
                            @endphp

                            <div class="mb-3">
                                <img src="{{ $cover ? asset('storage/' . $cover->file_name) : $placeholder }}"
                                    class="img-fluid rounded w-100" style="height:200px; object-fit:cover;"
                                    alt="Cover Proyek">
                            </div>


                            {{-- INFO --}}
                            <h5 class="fw-bold text-primary mb-2">
                                {{ $proyek->nama_proyek }}
                            </h5>

                            <p class="mb-1">
                                <strong>Kode:</strong> {{ $proyek->kode_proyek }}
                            </p>
                            <p class="mb-1">
                                <strong>Tahun:</strong> {{ $proyek->tahun }}
                            </p>
                            <p class="mb-1">
                                <strong>Lokasi:</strong> {{ $proyek->lokasi }}
                            </p>
                            <p class="mb-3">
                                <strong>Sumber Dana:</strong> {{ $proyek->sumber_dana }}
                            </p>

                            {{-- BUTTON --}}
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('proyek.show', $proyek->proyek_id) }}"
                                    class="btn btn-info btn-sm">Detail</a>

                                <a href="{{ route('proyek.edit', $proyek->proyek_id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('proyek.destroy', $proyek->proyek_id) }}" method="POST"
                                    onsubmit="return confirm('Hapus proyek ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>

                        </div>

                    </div>
                @empty
                    <div class="col-12 text-center text-muted py-5 wow fadeInUp">
                        <p>Belum ada data proyek.</p>
                    </div>
                @endforelse
            </div>

            {{-- PAGINATION --}}
            <div class="mt-5">
                {{ $dataProyek->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>
    <!-- Feature End -->

    </main>
@endsection
