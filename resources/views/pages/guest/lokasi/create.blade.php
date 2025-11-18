@extends('layouts.guest.app')

@section('content')
<main class="container mt-5">
    <h3 class="fw-bold text-primary mb-4">Tambah Lokasi Proyek</h3>

    <form action="{{ route('lokasi.store') }}" method="POST">
        @csrf

        <label>Proyek</label>
        <select name="proyek_id" class="form-control mb-3" required>
            <option value="">-- Pilih Proyek --</option>
            @foreach ($proyek as $p)
            <option value="{{ $p->proyek_id }}">{{ $p->nama_proyek }}</option>
            @endforeach
        </select>

        <label>Latitude</label>
        <input type="text" name="lat" class="form-control mb-3">

        <label>Longitude</label>
        <input type="text" name="lng" class="form-control mb-3">

        <label>GeoJSON</label>
        <textarea name="geojason" class="form-control mb-3"></textarea>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('lokasi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</main>
@endsection
