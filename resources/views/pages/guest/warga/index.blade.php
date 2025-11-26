@extends('layouts.guest.app')

@section('content')
    <main class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold text-primary">Daftar Warga</h3>
            <a href="{{ route('warga.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus me-1"></i> Tambah Proyek
            </a>
        </div>

        <div class="table-responsive mb-3">
            <form method="GET" onchange="this.submit()">
                <div class="row g-2">

                    {{-- Gender --}}
                    <div class="col-md-3">
                        <select name="jenis_kelamin" class="form-select">
                            <option value="">Semua Gender</option>
                            <option value="L" {{ request('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ request('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    {{-- Agama --}}
                    <div class="col-md-3">
                        <select name="agama" class="form-select">
                            <option value="">Semua Agama</option>
                            <option value="Islam" {{ request('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                            <option value="Kristen" {{ request('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                            <option value="Katolik" {{ request('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                            <option value="Hindu" {{ request('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                            <option value="Buddha" {{ request('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                            <option value="Konghucu" {{ request('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                        </select>
                    </div>

                    {{-- Pekerjaan --}}
                    <div class="col-md-3">
                        <select name="pekerjaan" class="form-select">
                            <option value="">Semua Pekerjaan</option>
                            <option value="Karyawan" {{ request('pekerjaan') == 'Karyawan' ? 'selected' : '' }}>Karyawan</option>
                            <option value="Wiraswasta" {{ request('pekerjaan') == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta
                            </option>
                            <option value="Mahasiswa" {{ request('pekerjaan') == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa
                            </option>
                            <option value="Guru" {{ request('pekerjaan') == 'Guru' ? 'selected' : '' }}>Guru</option>
                            <option value="Petani" {{ request('pekerjaan') == 'Petani' ? 'selected' : '' }}>Petani</option>
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

        <div class="row">
            @forelse ($dataWarga as $w)
                <div class="col-md-4 mb-4">
                    <div class="card card-custom h-100">
                        <div class="card-body d-flex">
                            <div class="me-3">
                                <div class="avatar">{{ strtoupper(substr($w->nama, 0, 1)) }}</div>
                            </div>

                            <div class="flex-fill">
                                <h5 class="card-title text-primary mb-1">{{ $w->nama }}</h5>

                                <ul class="list-unstyled mb-2">
                                    <li><strong>No KTP:</strong> {{ $w->no_ktp }}</li>
                                    <li><strong>Jenis Kelamin:</strong>
                                        {{ $w->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</li>
                                    <li><strong>Agama:</strong> {{ $w->agama ?? '-' }}</li>
                                    <li><strong>Pekerjaan:</strong> {{ $w->pekerjaan ?? '-' }}</li>
                                    <li><strong>Telp:</strong> {{ $w->telp ?? '-' }}</li>
                                    <li><strong>Email:</strong> {{ $w->email ?? '-' }}</li>
                                </ul>

                                <div class="d-flex">
                                    <a href="{{ route('warga.edit', $w->warga_id) }}" class="btn btn-warning btn-sm">
                                        <i class="fa-solid fa-pen-to-square me-1"></i> Edit
                                    </a>

                                    <form action="{{ route('warga.destroy', $w->warga_id) }}" method="POST"
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
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">Belum ada data warga.</div>
                </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        <div class="mt-3">
            {{ $dataWarga->links('pagination::bootstrap-5') }}
        </div>
    </main>
@endsection
