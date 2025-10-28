@extends('layouts.guest.app')

@section('content')
    {{-- start main content --}}
    <main class="container mt-5">
        <h3>Tambah Data Proyek</h3>
        <form action="{{ route('proyek.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="kode_proyek" class="form-label">Kode Proyek</label>
                <input type="text" name="kode_proyek" id="kode_proyek" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="nama_proyek" class="form-label">Nama Proyek</label>
                <input type="text" name="nama_proyek" id="nama_proyek" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tahun" class="form-label">Tahun</label>
                <input type="date" name="tahun" id="tahun" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <input type="text" name="lokasi" id="lokasi" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="anggaran" class="form-label">Anggaran</label>
                <input type="text" name="anggaran" id="anggaran" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="sumber_dana" class="form-label">Sumber Dana</label>
                <input type="text" name="sumber_dana" id="sumber_dana" class="form-control">
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="media" class="form-label">Upload Media (gambar optional)</label>
                <input type="file" name="media" id="media" class="form-control" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

    </main>
    {{-- end main content --}}
@endsection
