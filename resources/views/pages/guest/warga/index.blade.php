@extends('layouts.guest.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown">
                Daftar Warga
            </h4>

            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                <li class="breadcrumb-item active text-secondary">Warga</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <div class="container py-5">

        {{-- JUDUL --}}
        <div class="text-center mx-auto pb-5 wow fadeInUp" style="max-width: 800px;">
            <p class="text-uppercase text-secondary fs-5 mb-0">
                Data Penduduk
            </p>
            <h2 class="display-4 text-capitalize mb-3">
                Daftar Warga
            </h2>
        </div>

        {{-- FILTER + SEARCH + TAMBAH --}}
        <div class="row align-items-end mb-5 wow fadeInUp">

            <div class="col-lg-8">
                <form method="GET">
                    <div class="row g-2">

                        {{-- GENDER --}}
                        <div class="col-md-3">
                            <select name="jenis_kelamin" class="form-select" onchange="this.form.submit()">
                                <option value="">Semua Gender</option>
                                <option value="L" {{ request('jenis_kelamin') == 'L' ? 'selected' : '' }}>
                                    Laki-laki
                                </option>
                                <option value="P" {{ request('jenis_kelamin') == 'P' ? 'selected' : '' }}>
                                    Perempuan
                                </option>
                            </select>
                        </div>

                        {{-- AGAMA --}}
                        <div class="col-md-3">
                            <select name="agama" class="form-select" onchange="this.form.submit()">
                                <option value="">Semua Agama</option>
                                @foreach (['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'] as $agama)
                                    <option value="{{ $agama }}" {{ request('agama') == $agama ? 'selected' : '' }}>
                                        {{ $agama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- PEKERJAAN --}}
                        <div class="col-md-3">
                            <select name="pekerjaan" class="form-select" onchange="this.form.submit()">
                                <option value="">Semua Pekerjaan</option>
                                @foreach (['Karyawan', 'Wiraswasta', 'Mahasiswa', 'Guru', 'Petani'] as $job)
                                    <option value="{{ $job }}"
                                        {{ request('pekerjaan') == $job ? 'selected' : '' }}>
                                        {{ $job }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- SEARCH --}}
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Cari nama / KTP / telp..." value="{{ request('search') }}">

                                <button class="btn btn-secondary">
                                    <i class="fa fa-search"></i>
                                </button>

                                @if (request()->query())
                                    <a href="{{ route('warga.index') }}" class="btn btn-outline-danger">
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
                <a href="{{ route('warga.create') }}" class="btn btn-primary px-4">
                    <i class="fa fa-plus me-1"></i>
                    Tambah Warga
                </a>
            </div>

        </div>

        {{-- ALERT --}}
        @foreach (['success', 'update', 'delete'] as $msg)
            @if (session($msg))
                <div class="alert alert-{{ $msg == 'success' ? 'success' : ($msg == 'update' ? 'warning' : 'danger') }}">
                    {{ session($msg) }}
                </div>
            @endif
        @endforeach

        {{-- GRID WARGA --}}
        <div class="row g-4">
            @forelse ($dataWarga as $w)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $loop->iteration }}s">

                    <div class="team-item border border-primary p-1">

                        {{-- BORDER ANIMATION --}}
                        <div class="team-border-style-1"></div>
                        <div class="team-border-style-2"></div>
                        <div class="team-border-style-3"></div>
                        <div class="team-border-style-4"></div>

                        {{-- AVATAR --}}
                        <div class="team-img d-flex justify-content-center align-items-center"
                            style="height: 220px; background: #f1f1f1;">
                            <div class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center"
                                style="width: 110px; height: 110px; font-size: 42px; font-weight: 600;">
                                {{ strtoupper(substr($w->nama, 0, 1)) }}
                            </div>
                        </div>

                        {{-- CONTENT --}}
                        <div class="text-center border border-top-0 bg-white py-3 px-2">

                            <h5 class="mb-1">{{ $w->nama }}</h5>
                            <p class="text-secondary mb-1">
                                {{ $w->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                • {{ $w->pekerjaan ?? '-' }}
                            </p>

                            <p class="text-muted small mb-1">
                                KTP: {{ $w->no_ktp }}
                            </p>

                            <p class="text-muted small mb-1">
                                {{ $w->telp ?? '-' }}
                            </p>

                            <p class="text-muted small mb-2">
                                {{ $w->email ?? '-' }}
                            </p>

                            {{-- ACTION --}}
                            <div class="d-flex justify-content-center gap-2 flex-wrap">

                                {{-- DETAIL --}}
                                <a href="{{ route('warga.show', $w->warga_id) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-eye me-1"></i>
                                    Detail
                                </a>

                                {{-- EDIT --}}
                                <a href="{{ route('warga.edit', $w->warga_id) }}" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit me-1"></i>
                                    Edit
                                </a>

                                {{-- HAPUS --}}
                                <form action="{{ route('warga.destroy', $w->warga_id) }}" method="POST"
                                    onsubmit="return confirm('Hapus warga ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash me-1"></i>
                                        Hapus
                                    </button>
                                </form>

                            </div>


                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5 wow fadeInUp">
                    <p>Belum ada data warga.</p>
                </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        <div class="mt-5 text-center wow fadeInUp">
            {{ $dataWarga->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection
