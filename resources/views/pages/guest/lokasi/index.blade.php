@extends('layouts.guest.app')

@section('content')
    <main class="container mt-5">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold text-primary">Daftar Lokasi Proyek</h3>
            <a href="{{ route('lokasi.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus me-1"></i> Tambah Lokasi
            </a>
        </div>

        <div class="table-responsive mb-3">
            <form method="GET" onchange="this.submit()">
                <div class="row g-2">

                    <div class="col-md-3">
                        <select name="proyek_id" class="form-select">
                            <option value="">Semua Proyek</option>
                            @foreach ($proyek as $p)
                                <option value="{{ $p->proyek_id }}"
                                    {{ request('proyek_id') == $p->proyek_id ? 'selected' : '' }}>
                                    {{ $p->nama_proyek }}
                                </option>
                            @endforeach
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





        {{-- Alert --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('update'))
            <div class="alert alert-warning">{{ session('update') }}</div>
        @elseif(session('delete'))
            <div class="alert alert-danger">{{ session('delete') }}</div>
        @endif

        <div class="row">
            @forelse ($lokASI as $lok)
                <div class="col-md-4 mb-4">
                    <div class="card card-custom h-100">

                        <div class="card-body d-flex">

                            {{-- Avatar --}}
                            <div class="me-3">
                                <div class="avatar">
                                    {{ strtoupper(substr($lok->proyek->nama_proyek, 0, 1)) }}
                                </div>
                            </div>

                            <div class="flex-fill">
                                {{-- Nama Proyek --}}
                                <h5 class="card-title text-primary mb-1">
                                    {{ $lok->proyek->nama_proyek }}
                                </h5>

                                <ul class="list-unstyled mb-2">
                                    <li><strong>Latitude:</strong> {{ $lok->lat }}</li>
                                    <li><strong>Longitude:</strong> {{ $lok->lng }}</li>
                                    <li><strong>GeoJSON:</strong>
                                        {{ $lok->geojson ? Str::limit($lok->geojson, 45) : '-' }}
                                    </li>
                                </ul>

                                <div class="d-flex">
                                    <a href="{{ route('lokasi.edit', $lok->lokasi_id) }}"
                                        class="btn btn-warning btn-sm me-2">
                                        <i class="fa-solid fa-pen-to-square me-1"></i> Edit
                                    </a>

                                    <form action="{{ route('lokasi.destroy', $lok->lokasi_id) }}" method="POST"
                                        onsubmit="return confirm('Hapus data lokasi ini?')" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa-solid fa-trash-can me-1"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">Belum ada data lokasi proyek.</div>
                </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        <div class="mt-3">
            {{ $lokASI->links('pagination::bootstrap-5') }}
        </div>

    </main>

    {{-- Avatar style jika belum ada --}}
    <style>
        .avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: #0d6efd;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 20px;
        }
    </style>
@endsection
