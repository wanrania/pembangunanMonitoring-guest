@extends('layouts.guest.app')

@section('content')
<main class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold text-primary">Daftar Warga</h3>
        <a href="{{ route('warga.create') }}" class="btn btn-primary">+ Tambah Warga</a>
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
                            <div class="avatar">{{ strtoupper(substr($w->nama,0,1)) }}</div>
                        </div>

                        <div class="flex-fill">
                            <h5 class="card-title text-primary mb-1">{{ $w->nama }}</h5>

                            <ul class="list-unstyled mb-2">
                                <li><strong>No KTP:</strong> {{ $w->no_ktp }}</li>
                                <li><strong>Jenis Kelamin:</strong> {{ $w->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</li>
                                <li><strong>Agama:</strong> {{ $w->agama ?? '-' }}</li>
                                <li><strong>Pekerjaan:</strong> {{ $w->pekerjaan ?? '-' }}</li>
                                <li><strong>Telp:</strong> {{ $w->telp ?? '-' }}</li>
                                <li><strong>Email:</strong> {{ $w->email ?? '-' }}</li>
                            </ul>

                            <div class="d-flex">
                                <a href="{{ route('warga.edit', $w->warga_id) }}" class="btn btn-sm btn-warning me-2">Edit</a>

                                <form action="{{ route('warga.destroy', $w->warga_id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus data ini?')" class="btn btn-sm btn-danger">Hapus</button>
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
</main>
@endsection
