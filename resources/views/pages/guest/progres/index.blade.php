@extends('layouts.guest.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown">Progres Proyek</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active text-secondary">
                    Progres Proyek
                </li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Projects Start -->
    <div class="container-fluid project py-5">
        <div class="container py-5">

            {{-- JUDUL --}}
            <div class="text-center mx-auto pb-5 wow fadeInUp" style="max-width: 800px;">
                <p class="text-uppercase text-secondary fs-5 mb-0">
                    Monitoring
                </p>
                <h2 class="display-4 text-capitalize mb-3">
                    Progres Proyek
                </h2>
            </div>

            {{-- FILTER + SEARCH + TAMBAH --}}
            <div class="row align-items-end mb-5 wow fadeInUp">

                {{-- FILTER + SEARCH --}}
                <div class="col-lg-8">
                    <form method="GET">
                        <div class="row g-2">

                            {{-- FILTER PROGRES --}}
                            <div class="col-md-4">
                                <select name="progres" class="form-select" onchange="this.form.submit()">
                                    <option value="">Semua Progres</option>

                                    <option value="0-25" {{ request('progres') == '0-25' ? 'selected' : '' }}>
                                        0% – 25%
                                    </option>

                                    <option value="26-50" {{ request('progres') == '26-50' ? 'selected' : '' }}>
                                        26% – 50%
                                    </option>

                                    <option value="51-75" {{ request('progres') == '51-75' ? 'selected' : '' }}>
                                        51% – 75%
                                    </option>

                                    <option value="76-100" {{ request('progres') == '76-100' ? 'selected' : '' }}>
                                        76% – 100%
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

                                    @if (request('search') || request('progres'))
                                        <a href="{{ route('progres.index') }}" class="btn btn-outline-danger">
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
                    <a href="{{ route('progres.create') }}" class="btn btn-primary px-4">
                        <i class="fa fa-plus me-1"></i>
                        Tambah Proyek
                    </a>
                </div>

            </div>
            {{-- LIST PROGRES --}}

            <div class="row g-5">

                @forelse($data as $row)
                    <div class="col-lg-6 wow fadeInUp">
                        <div class="project-item">

                            <div class="row g-4">

                                {{-- IMAGE --}}
                                <div class="col-md-4">
                                    <div class="project-img">

                                        @php
                                            $cover = $row->media->first() ?? null;
                                            $placeholder = asset('assets-guest/img/placeholder-progres.jpg');
                                        @endphp

                                        <img src="{{ $cover ? asset('storage/' . $cover->file_name) : $placeholder }}"
                                            class="img-fluid w-100 pt-3 ps-3" alt="Progres Proyek">

                                    </div>
                                </div>


                                {{-- CONTENT --}}
                                <div class="col-md-8">
                                    <div class="project-content mb-3">

                                        <p class="fs-5 text-secondary mb-1">
                                            {{ $row->tahap->nama_tahap }}
                                        </p>

                                        <a href="{{ route('progres.show', $row->progres_id) }}" class="h4 d-block">
                                            {{ $row->proyek->nama_proyek }}
                                        </a>

                                        <p class="mb-1 mt-2">
                                            <strong>Progres:</strong>
                                            {{ $row->persen_real }}%
                                        </p>

                                        <p class="mb-1">
                                            <strong>Tanggal:</strong>
                                            {{ \Carbon\Carbon::parse($row->tanggal)->format('d M Y') }}
                                        </p>

                                        <p class="mb-0 mt-2 text-muted">
                                            {{ Str::limit($row->catatan, 90) }}
                                        </p>
                                    </div>

                                    {{-- BUTTON --}}
                                    <div class="d-flex gap-2 flex-wrap">
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('progres.show', $row->progres_id) }}">
                                            Detail
                                        </a>

                                        <a class="btn btn-warning btn-sm"
                                            href="{{ route('progres.edit', $row->progres_id) }}">
                                            Edit
                                        </a>

                                        <form action="{{ route('progres.destroy', $row->progres_id) }}" method="POST"
                                            onsubmit="return confirm('Hapus progres ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted py-5 wow fadeInUp">
                        <p>Belum ada data progres proyek.</p>
                    </div>
                @endforelse

                {{-- PAGINATION --}}
                <div class="col-12 text-center wow fadeInUp">
                    {{ $data->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>
    </div>
    <!-- Projects End -->
@endsection
