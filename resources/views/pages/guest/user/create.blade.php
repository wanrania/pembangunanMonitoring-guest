@extends('layouts.guest.app')
@section('title', 'Tambah User')

@section('content')

    <!-- Header -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown">
                Tambah User Baru
            </h4>

            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
                <li class="breadcrumb-item active text-secondary">Tambah</li>
            </ol>
        </div>
    </div>

    <div class="container py-5">
        <div class="row justify-content-center">

            <div class="col-lg-6 wow fadeInUp">

                <div class="team-item border border-primary p-1">

                    {{-- BORDER ANIMATION --}}
                    <div class="team-border-style-1"></div>
                    <div class="team-border-style-2"></div>
                    <div class="team-border-style-3"></div>
                    <div class="team-border-style-4"></div>

                    <div class="bg-white p-4 p-md-5">

                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf

                            {{-- NAMA --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nama</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- EMAIL --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Email</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- PASSWORD --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Password</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- ROLE --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Role</label>
                                <select name="role" class="form-select" required>
                                    <option value="">Pilih Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role }}">{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- BUTTON --}}
                            <div class="text-center mt-4">

                                @auth
                                    @if(auth()->user()->role === 'Admin')
                                        <button type="submit" class="btn btn-primary px-5 me-2">
                                            <i class="fa fa-save me-1"></i> Simpan
                                        </button>
                                    @else
                                        <p class="text-danger fw-semibold">
                                            Anda tidak memiliki izin menambah user.
                                        </p>
                                    @endif
                                @endauth

                                <a href="{{ route('user.index') }}" class="btn btn-secondary px-5">
                                    <i class="fa fa-arrow-left me-1"></i> Kembali
                                </a>
                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>
    </div>

@endsection
