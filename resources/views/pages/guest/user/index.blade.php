@extends('layouts.guest.app')
@section('title', 'Data User')

@section('content')
    <main class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-primary">Daftar User</h3>
            <a href="{{ route('user.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus me-1"></i> Tambah Proyek
            </a>
        </div>

        <div class="table-responsive mb-3">
            <form method="GET" onchange="this.submit()">
                <div class="row g-2">

                    <div class="col-md-3">
                        <select name="email" class="form-select">
                            <option value="">Semua Email</option>
                            <option value="@gmail.com" {{ request('email') == '@gmail.com' ? 'selected' : '' }}>Gmail.com
                            </option>
                            <option value="@yahoo.com" {{ request('email') == '@yahoo.com' ? 'selected' : '' }}>Yahoo.com
                            </option>
                            <option value="@example.com" {{ request('email') == '@example.com' ? 'selected' : '' }}>
                                Example.com
                            </option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search..."
                                value="{{ request('search') }}">

                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                            @if (request('search'))
                                <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}"
                                    class="btn btn-outline-secondary ml-3" id="clear-search"> Clear</a>
                            @endif
                        </div>
                    </div>

                </div>
            </form>
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
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                <i class="fa-solid fa-pen-to-square me-1"></i> Edit
                            </a>
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa-solid fa-trash-can me-1"></i> Hapus
                                </button>
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

        <div class="mt-3">
            {{ $dataUser->links('pagination::bootstrap-5') }}
        </div>

    </main>

@endsection
