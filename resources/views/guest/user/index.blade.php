@extends('layouts.guest.app')
@section('title', 'Data User')

@section('content')
    <main class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-primary">Daftar User</h3>
            <a href="{{ route('user.create') }}" class="btn btn-primary">+ Tambah User</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('update'))
            <div class="alert alert-warning">{{ session('update') }}</div>
        @elseif(session('delete'))
            <div class="alert alert-danger">{{ session('delete') }}</div>
        @endif

        <div class="row g-4">
            @forelse ($dataUser as $user)
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100 rounded-4">
                        <div class="card-body d-flex align-items-center">
                            {{-- Avatar huruf pertama --}}
                            <div class="avatar me-3">
                                <span>{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                            </div>

                            <div>
                                <h5 class="card-title text-uppercase text-primary fw-bold mb-2">{{ $user->name }}</h5>
                                <p class="mb-1"><strong>Email:</strong> {{ $user->email }}</p>
                            </div>
                        </div>

                        <div class="card-footer bg-transparent border-0 d-flex justify-content-between p-3">
                            <a href="{{ route('user.edit', ['user' => $user->id]) }}"
                                class="btn btn-warning btn-sm px-3">Edit</a>
                            <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm px-3"
                                    onclick="return confirm('Yakin hapus user ini?')">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">
                    <p>Belum ada data user.</p>
                </div>
            @endforelse
        </div>
    </main>

@endsection
