@extends('layouts.guest.app')

@section('content')
    {{-- start main content --}}
    <main class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-primary">Daftar Proyek</h3>
            <a href="{{ route('proyek.create') }}" class="btn btn-primary">+ Tambah Proyek</a>
        </div>

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
                            <a href="{{ route('proyek.edit', ['proyek' => $proyek->proyek_id]) }}"
                                class="btn btn-warning btn-sm px-3">Edit</a>
                            <form action="{{ route('proyek.destroy', ['proyek' => $proyek->proyek_id]) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm px-3"
                                    onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
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
    </main>

    {{-- end main content --}}
@endsection
