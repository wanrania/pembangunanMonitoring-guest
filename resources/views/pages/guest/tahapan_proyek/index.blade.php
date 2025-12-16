@extends('layouts.guest.app')

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown">Tahapan Proyek</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item active text-secondary">
                Tahapan Proyek
            </li>
        </ol>
    </div>
</div>
<!-- Header End -->

<!-- Feature Start -->
<div class="container-fluid feature bg-light py-5">
    <div class="container py-5">

        {{-- JUDUL --}}
        <div class="text-center mx-auto pb-4 wow fadeInUp" style="max-width: 800px;">
            <p class="text-uppercase text-secondary fs-5 mb-0">Monitoring</p>
            <h2 class="display-4 text-capitalize mb-3">
                Data Tahapan Proyek
            </h2>
        </div>

        {{-- FILTER + SEARCH + TAMBAH --}}
        <div class="row align-items-end mb-5 wow fadeInUp">

            {{-- FILTER + SEARCH --}}
            <div class="col-lg-8">
                <form method="GET">
                    <div class="row g-2">

                        {{-- FILTER NAMA TAHAP --}}
                        <div class="col-md-4">
                            <select name="nama_tahap"
                                    class="form-select"
                                    onchange="this.form.submit()">
                                <option value="">Semua Tahap</option>
                                @foreach ($listTahap as $tahap)
                                    <option value="{{ $tahap }}"
                                        {{ request('nama_tahap') == $tahap ? 'selected' : '' }}>
                                        {{ $tahap }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- SEARCH NAMA PROYEK --}}
                        <div class="col-md-8">
                            <div class="input-group">
                                <input type="text"
                                       name="search"
                                       class="form-control"
                                       placeholder="Cari nama proyek..."
                                       value="{{ request('search') }}">

                                <button class="btn btn-secondary">
                                    <i class="fa fa-search"></i>
                                </button>

                                @if (request('search') || request('nama_tahap'))
                                    <a href="{{ route('tahapan.index') }}"
                                       class="btn btn-outline-danger">
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
                <a href="{{ route('tahapan.create') }}"
                   class="btn btn-primary px-4">
                    <i class="fa fa-plus me-1"></i>
                    Tambah Tahapan
                </a>
            </div>

        </div>

        {{-- LIST TAHAPAN --}}
        <div class="row g-4">
            @forelse($data as $row)
                <div class="col-lg-4 wow fadeInUp">
                    <div class="feature-item text-center border p-4 h-100">

                        @php
                            $number = ($data->currentPage() - 1) * $data->perPage() + $loop->iteration;
                        @endphp

                        {{-- ICON ANGKA --}}
                        <div class="feature-img bg-secondary d-inline-flex align-items-center justify-content-center p-3 mb-3"
                             style="width:80px;height:80px;">
                            <span class="fw-bold text-primary" style="font-size:40px;">
                                {{ $number }}
                            </span>
                        </div>

                        {{-- JUDUL --}}
                        <h5 class="fw-bold mb-2">
                            {{ $row->nama_tahap }}
                        </h5>

                        {{-- PROYEK --}}
                        <p class="mb-3">
                            <strong>Proyek:</strong><br>
                            {{ $row->proyek->nama_proyek }}
                        </p>

                        {{-- AKSI --}}
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('tahapan.show', $row->tahap_id) }}"
                               class="btn btn-info btn-sm">
                                Detail
                            </a>

                            <a href="{{ route('tahapan.edit', $row->tahap_id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('tahapan.destroy', $row->tahap_id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Hapus tahapan ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    Hapus
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">
                    <p>Belum ada data tahapan proyek.</p>
                </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        <div class="mt-5">
            {{ $data->links('pagination::bootstrap-5') }}
        </div>

    </div>
</div>
<!-- Feature End -->

@endsection
