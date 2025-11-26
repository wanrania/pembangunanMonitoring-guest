@extends('layouts.guest.app')

@section('content')
    {{-- start main content --}}
    <main class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-primary">Daftar Proyek</h3>
            <a href="{{ route('proyek.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus me-1"></i> Tambah Proyek
            </a>
        </div>

        <div class="table-responsive mb-3">
            <form method="GET" onchange="this.submit()">
                <div class="row g-2">

                    {{-- Sumber Dana --}}
                    <div class="col-md-3">
                        <select name="sumber_dana" class="form-select">
                            <option value="">Semua Sumber Dana</option>
                            <option value="APBN" {{ request('sumber_dana') == 'APBN' ? 'selected' : '' }}>APBN</option>
                            <option value="APBD" {{ request('sumber_dana') == 'APBD' ? 'selected' : '' }}>APBD</option>
                            <option value="Dana Desa" {{ request('sumber_dana') == 'Dana Desa' ? 'selected' : '' }}>Dana
                                Desa
                            </option>
                            <option value="CSR" {{ request('sumber_dana') == 'CSR' ? 'selected' : '' }}>CSR</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search..."
                                value="{{ request('search') }}">

                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                            @if (request('search'))
                                <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}"
                                    class="btn btn-outline-secondary ml-3" id="clear-search"> Clear</a>
                            @endif
                        </div>
                    </div>

                </div>
            </form>
        </div>


        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('update'))
            <div class="alert alert-warning">{{ session('update') }}</div>
        @elseif(session('delete'))
            <div class="alert alert-danger">{{ session('delete') }}</div>
        @endif

        <div class="row g-4">
            @forelse ($dataProyek as $proyek)
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100 rounded-4">
                        @if ($proyek->media)
                            <img src="{{ asset('storage/' . $proyek->media) }}" class="card-img-top rounded-top-4"
                                alt="{{ $proyek->nama_proyek }}" style="height: 200px; object-fit: cover;">
                        @endif

                        <div class="card-body p-3">
                            {{-- Nama proyek di atas --}}
                            <h5 class="card-title text-uppercase fw-bold text-primary mb-3 text-center">
                                {{ $proyek->nama_proyek }}
                            </h5>

                            {{-- Detail proyek --}}
                            <ul class="list-unstyled mb-3">
                                <li><strong>Kode Proyek:</strong> {{ $proyek->kode_proyek }}</li>
                                <li><strong>Tahun:</strong> {{ $proyek->tahun }}</li>
                                <li><strong>Lokasi:</strong> {{ $proyek->lokasi }}</li>
                                <li><strong>Anggaran:</strong> {{ $proyek->anggaran }}</li>
                                <li><strong>Sumber Dana:</strong> {{ $proyek->sumber_dana }}</li>
                                <li><strong>Deskripsi:</strong> {{ $proyek->deskripsi }}</li>
                            </ul>
                        </div>



                        <div class="card-footer bg-transparent border-0 d-flex justify-content-between p-3">
                            <a href="{{ route('proyek.edit', $proyek->proyek_id) }}" class="btn btn-warning btn-sm">
                                <i class="fa-solid fa-pen-to-square me-1"></i> Edit
                            </a>

                            <form action="{{ route('proyek.destroy', $proyek->proyek_id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa-solid fa-trash-can me-1"></i> Hapus
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">
                    <p>Belum ada data proyek.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-3">
            {{ $dataProyek->links('pagination::bootstrap-5') }}
        </div>

    </main>

    {{-- end main content --}}
@endsection
