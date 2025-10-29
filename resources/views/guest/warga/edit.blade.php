@extends('layouts.guest.app')

@section('content')
<main class="container mt-5">
    <div class="card p-4">
        <h4 class="mb-3">Edit Data Warga</h4>

        <form action="{{ route('warga.update', $dataWarga->warga_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">No KTP</label>
                <input type="text" name="no_ktp" value="{{ old('no_ktp', $dataWarga->no_ktp) }}" class="form-control @error('no_ktp') is-invalid @enderror">
                @error('no_ktp') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" value="{{ old('nama', $dataWarga->nama) }}" class="form-control @error('nama') is-invalid @enderror">
                @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select">
                    <option value="L" {{ old('jenis_kelamin', $dataWarga->jenis_kelamin)=='L' ? 'selected':'' }}>Laki-laki</option>
                    <option value="P" {{ old('jenis_kelamin', $dataWarga->jenis_kelamin)=='P' ? 'selected':'' }}>Perempuan</option>
                </select>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Agama</label>
                    <input type="text" name="agama" value="{{ old('agama', $dataWarga->agama) }}" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Pekerjaan</label>
                    <input type="text" name="pekerjaan" value="{{ old('pekerjaan', $dataWarga->pekerjaan) }}" class="form-control">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Telp</label>
                <input type="text" name="telp" value="{{ old('telp', $dataWarga->telp) }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email', $dataWarga->email) }}" class="form-control">
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('warga.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</main>
@endsection
