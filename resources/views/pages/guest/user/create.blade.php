@extends('layouts.guest.app')
@section('title', 'Tambah User')

@section('content')
<div class="card shadow-sm p-4">
    <h4 class="mb-4">Tambah User Baru</h4>

    <form action="{{ route('user.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">
                <i class="fa-solid fa-floppy-disk me-1"></i> Simpan
            </button>

            <a href="{{ route('user.index') }}" class="btn btn-secondary">
                <i class="fa-solid fa-arrow-left me-1"></i> Kembali
            </a>
    </form>
</div>
@endsection
