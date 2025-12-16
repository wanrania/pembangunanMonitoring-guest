@extends('layouts.guest.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Daftar Kontraktor</h4>

            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                <li class="breadcrumb-item active text-secondary">Kontraktor</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <div class="container py-5">

        {{-- FILTER + SEARCH + TAMBAH --}}
        <div class="row align-items-end mb-5 wow fadeInUp">

            {{-- FILTER + SEARCH --}}
            <div class="col-lg-8">
                <form method="GET">
                    <div class="row g-2">

                        {{-- FILTER PROYEK --}}
                        <div class="col-md-4">
                            <select name="proyek_id" class="form-select" onchange="this.form.submit()">
                                <option value="">Semua Proyek</option>

                                @foreach ($listProyek as $p)
                                    <option value="{{ $p->proyek_id }}"
                                        {{ request('proyek_id') == $p->proyek_id ? 'selected' : '' }}>
                                        {{ $p->nama_proyek }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- SEARCH --}}
                        <div class="col-md-8">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Cari kontraktor, PJ, kontak, atau alamat..."
                                    value="{{ request('search') }}">

                                <button class="btn btn-secondary">
                                    <i class="fa fa-search"></i>
                                </button>

                                @if (request('search') || request('proyek_id'))
                                    <a href="{{ route('kontraktor.index') }}" class="btn btn-outline-danger">
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
                <a href="{{ route('kontraktor.create') }}" class="btn btn-primary px-4">
                    <i class="fa fa-plus me-1"></i>
                    Tambah Kontraktor
                </a>
            </div>

        </div>



        <!-- TEAM GRID -->
        <div class="row g-4">

            @forelse ($data as $k)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $loop->iteration }}s">
                    <div class="team-item border border-primary p-1 position-relative">

                        <!-- Border animation style -->
                        <div class="team-border-style-1"></div>
                        <div class="team-border-style-2"></div>
                        <div class="team-border-style-3"></div>
                        <div class="team-border-style-4"></div>

                        <div class="team-img position-relative d-flex justify-content-center align-items-center"
                            style="height: 230px; background: #f1f1f1; border-radius: 10px;">

                            <div class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center"
                                style="width: 120px; height: 120px; font-size: 48px; font-weight: 600;">
                                {{ strtoupper(substr($k->nama, 0, 1)) }}
                            </div>

                        </div>


                        <div class="text-center border border-top-0 bg-white py-3">

                            <h4 class="mb-0">{{ $k->nama }}</h4>
                            <p class="mb-1 text-secondary">PJ: {{ $k->penanggung_jawab }}</p>
                            <p class="text-muted small mb-1">{{ $k->kontak }}</p>

                            @if ($k->proyek)
                                <span class="badge bg-primary mb-2">
                                    {{ $k->proyek->nama_proyek }}
                                </span>
                            @endif

                            <!-- ACTION BUTTONS -->
                            <div class="mt-2">
                                <a href="{{ route('kontraktor.edit', $k->kontraktor_id) }}"
                                    class="btn btn-warning btn-sm me-1">
                                    Edit
                                </a>

                                <form action="{{ route('kontraktor.destroy', $k->kontraktor_id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Hapus kontraktor ini?')" class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            @empty

                <div class="text-center py-5">
                    <h4 class="text-muted">Tidak ada data kontraktor ditemukan</h4>
                </div>
            @endforelse
        </div>

        <!-- PAGINATION -->
        <div class="mt-5">
            {{ $data->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection
