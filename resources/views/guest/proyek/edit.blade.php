@extends('layouts.guest.app')

@section('content')
    {{-- start main content --}}
    <main class="container mt-5">
        <h3>Edit Data Proyek</h3>
        <form action="{{ url('proyek/' . $dataProyek->proyek_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <div class="col">
                    <label>Kode Proyek</label>
                    <input type="text" name="kode_proyek" value="{{ $dataProyek->kode_proyek }}" class="form-control"
                        required>
                </div>
                <div class="col">
                    <label>Nama Proyek</label>
                    <input type="text" name="nama_proyek" value="{{ $dataProyek->nama_proyek }}" class="form-control"
                        required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label>Tahun</label>
                    <input type="date" name="tahun" value="{{ $dataProyek->tahun }}" class="form-control">
                </div>
                <div class="col">
                    <label>Lokasi</label>
                    <input type="text" name="lokasi" value="{{ $dataProyek->lokasi }}" class="form-control" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label>Anggaran</label>
                    <input type="text" name="anggaran" value="{{ $dataProyek->anggaran }}" class="form-control" required>
                </div>
                <div class="col">
                    <label>Sumber Dana</label>
                    <input type="text" name="sumber_dana" value="{{ $dataProyek->sumber_dana }}" class="form-control">
                </div>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3">{{ $dataProyek->deskripsi }}</textarea>
            </div>

            <div class="mb-3">
                <label>Media</label>
                <input type="text" name="media" value="{{ $dataProyek->media }}" class="form-control">
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ url('proyek') }}" class="btn btn-secondary me-2">Kembali</a>
                <button type="submit" class="btn btn-warning">Update</button>
            </div>
        </form>
    </main>
    {{-- end main content --}}
@endsection
