@extends('layouts.guest.app')

@section('content')
    {{-- start main content --}}
    <main class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Daftar Proyek</h3>
            <a href="{{ route('proyek.create') }}" class="btn btn-primary">+ Tambah Proyek</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('update'))
            <div class="alert alert-warning">{{ session('update') }}</div>
        @elseif(session('delete'))
            <div class="alert alert-danger">{{ session('delete') }}</div>
        @endif

        @if ($dataProyek->isEmpty())
            <div class="text-center text-muted my-5">
                <h5>Belum ada data proyek.</h5>
            </div>
        @else
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach ($dataProyek as $proyek)
                    <div class="col">
                        <div class="card card-custom h-100 overflow-hidden">

                            {{-- Jika ada gambar --}}
                            @if (!empty($proyek->media))
                                <img src="{{ asset('storage/' . $proyek->media) }}" class="card-img-top"
                                    alt="Gambar {{ $proyek->nama_proyek }}" style="height: 180px; object-fit: cover;">
                            @else
                                {{-- Kalau nggak ada gambar, kasih background default --}}
                                <div class="d-flex align-items-center justify-content-center bg-light"
                                    style="height: 180px;">
                                    <span class="text-muted">Tidak ada gambar</span>
                                </div>
                            @endif

                            <div class="card-body">
                                <h5 class="card-title mb-2">{{ $proyek->nama_proyek }}</h5>
                                <p class="card-text mb-1"><strong>Kode Proyek:</strong> {{ $proyek->kode_proyek }}</p>
                                <p class="card-text mb-1"><strong>Tahun:</strong> {{ $proyek->tahun }}</p>
                                <p class="card-text mb-1"><strong>Lokasi:</strong> {{ $proyek->lokasi }}</p>
                                <p class="card-text mb-1"><strong>Anggaran:</strong> {{ $proyek->anggaran }}</p>
                                <p class="card-text mb-1"><strong>Sumber Dana:</strong> {{ $proyek->sumber_dana }}</p>
                                <p class="card-text mb-1"><strong>Deskripsi:</strong> {{ $proyek->deskripsi }}</p>

                                <div class="d-flex justify-content-between mt-3">
                                    <a href="{{ route('proyek.edit', ['proyek' => $proyek->proyek_id]) }}"
                                        class="btn btn-sm btn-warning">Edit</a>

                                    <form action="{{ route('proyek.destroy', ['proyek' => $proyek->proyek_id]) }}"
                                        method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </main>
    {{-- end main content --}}
@endsection
