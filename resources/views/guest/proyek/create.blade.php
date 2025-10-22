@extends('guest.dashboard') {{-- karena file-nya ada di resources/views/guest/dashboard.blade.php --}}

@section('content')
<div class="container mt-4">
    <h3>Tambah Data Proyek</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('proyek.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Kode Proyek</label>
            <input type="text" name="kode_proyek" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Proyek</label>
            <input type="text" name="nama_proyek" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tahun</label>
            <input type="number" name="tahun" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Anggaran</label>
            <input type="number" step="0.01" name="anggaran" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Sumber Dana</label>
            <input type="text" name="sumber_dana" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
