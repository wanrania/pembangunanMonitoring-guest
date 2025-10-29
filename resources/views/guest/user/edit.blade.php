@extends('layouts.guest.app')
@section('title', 'Edit User')

@section('content')
<div class="card shadow-sm p-4">
    <h4 class="mb-4">Edit Data User</h4>

    <form action="{{ route('user.update', $dataUser->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $dataUser->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $dataUser->email }}" required>
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
