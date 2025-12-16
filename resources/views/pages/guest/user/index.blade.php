@extends('layouts.guest.app')
@section('title', 'Data User')

@section('content')

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown">
                Daftar User
            </h4>

            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active text-secondary">
                    User
                </li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <div class="container py-5">

        {{-- JUDUL --}}
        <div class="text-center mx-auto pb-5 wow fadeInUp" style="max-width: 800px;">
            <p class="text-uppercase text-secondary fs-5 mb-0">
                Manajemen
            </p>
            <h2 class="display-4 text-capitalize mb-3">
                Data User
            </h2>
        </div>

        {{-- FILTER + SEARCH + TAMBAH --}}
        <div class="row align-items-end mb-5 wow fadeInUp">

            <div class="col-lg-8">
                <form method="GET">
                    <div class="row g-2">

                        {{-- FILTER EMAIL --}}
                        <div class="col-md-4">
                            <select name="email" class="form-select" onchange="this.form.submit()">
                                <option value="">Semua Email</option>
                                <option value="@gmail.com" {{ request('email') == '@gmail.com' ? 'selected' : '' }}>
                                    Gmail
                                </option>
                                <option value="@yahoo.com" {{ request('email') == '@yahoo.com' ? 'selected' : '' }}>
                                    Yahoo
                                </option>
                                <option value="@example.com" {{ request('email') == '@example.com' ? 'selected' : '' }}>
                                    Example
                                </option>
                            </select>
                        </div>

                        {{-- SEARCH --}}
                        <div class="col-md-8">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Cari nama atau email user..." value="{{ request('search') }}">

                                <button class="btn btn-secondary">
                                    <i class="fa fa-search"></i>
                                </button>

                                @if (request('search') || request('email'))
                                    <a href="{{ route('user.index') }}" class="btn btn-outline-danger">
                                        Reset
                                    </a>
                                @endif
                            </div>
                        </div>

                    </div>
                </form>
            </div>

            {{-- BUTTON TAMBAH --}}
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <a href="{{ route('user.create') }}" class="btn btn-primary px-4">
                    <i class="fa fa-plus me-1"></i>
                    Tambah User
                </a>
            </div>

        </div>

        {{-- ALERT --}}
        @foreach (['success', 'update', 'delete'] as $msg)
            @if (session($msg))
                <div class="alert alert-{{ $msg == 'success' ? 'success' : ($msg == 'update' ? 'warning' : 'danger') }}">
                    {{ session($msg) }}
                </div>
            @endif
        @endforeach

        {{-- GRID USER --}}
        <div class="row g-4">
            @forelse ($dataUser as $user)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $loop->iteration }}s">

                    <div class="team-item border border-primary p-1">

                        {{-- BORDER ANIMATION --}}
                        <div class="team-border-style-1"></div>
                        <div class="team-border-style-2"></div>
                        <div class="team-border-style-3"></div>
                        <div class="team-border-style-4"></div>

                        {{-- AVATAR --}}
                        <div class="team-img d-flex justify-content-center align-items-center"
                            style="height: 220px; background: #f1f1f1;">
                            <div class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center"
                                style="width: 110px; height: 110px; font-size: 40px; font-weight: 600;">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                        </div>

                        {{-- CONTENT --}}
                        <div class="text-center border border-top-0 bg-white py-3 px-2">

                            <h5 class="mb-1 text-uppercase">
                                {{ $user->name }}
                            </h5>

                            <p class="text-muted small mb-3">
                                {{ $user->email }}
                            </p>

                            <p class="text-primary small mb-2">
                                {{ $user->role }}
                            </p>


                            {{-- ACTION --}}
                            <div class="d-flex justify-content-center gap-2">

                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit me-1"></i>
                                    Edit
                                </a>

                                <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                    onsubmit="return confirm('Hapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash me-1"></i>
                                        Hapus
                                    </button>
                                </form>

                            </div>

                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5 wow fadeInUp">
                    <p>Belum ada data user.</p>
                </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        <div class="mt-5 text-center wow fadeInUp">
            {{ $dataUser->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection
