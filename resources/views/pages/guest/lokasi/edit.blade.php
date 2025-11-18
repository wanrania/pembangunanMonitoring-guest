@extends('layouts.guest.app')

@section('content')
<main class="container mt-5">
    <h3 class="fw-bold text-primary mb-4">Edit Lokasi Proyek</h3>

    <form action="{{ route('lokasi.update', $lokasi->lokasi_id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Proyek</label>
        <select name="proyek_id" class="form-control mb-3">
            @foreach ($proyek as $p)
            <option value="{{ $p->proyek_id }}"
                {{ $p->proyek_id == $lokasi->proyek_id ? 'selected' : '' }}>
                {{ $p->nama_proyek }}
            </option>
            @endforeach
        </select>

        <label>Latitude</label>
        <input type="text" name="lat" class="form-control mb-3" value="{{ $lokasi->lat }}">

        <label>Longitude</label>
        <input type="text" name="lng" class="form-control mb-3" value="{{ $lokasi->lng }}">

        <label>GeoJSON</label>
        <textarea name="geojason" class="form-control mb-3">{{ $lokasi->geojason }}</textarea>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('lokasi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</main>
@endsection
