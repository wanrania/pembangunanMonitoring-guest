@extends('layouts.guest.app')

@section('content')
    <!-- Header -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown">
                Tambah Data Warga
            </h4>

            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('warga.index') }}">Warga</a></li>
                <li class="breadcrumb-item active text-secondary">Tambah</li>
            </ol>
        </div>
    </div>

    <div class="container py-5">
        <div class="row justify-content-center">

            <div class="col-lg-8 wow fadeInUp">

                <div class="team-item border border-primary p-1">

                    {{-- BORDER --}}
                    <div class="team-border-style-1"></div>
                    <div class="team-border-style-2"></div>
                    <div class="team-border-style-3"></div>
                    <div class="team-border-style-4"></div>

                    <div class="bg-white p-4 p-md-5">

                        <form action="{{ route('warga.store') }}" method="POST">
                            @csrf

                            <div class="row g-3">

                                {{-- NO KTP --}}
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">No KTP</label>
                                    <input type="text" name="no_ktp"
                                           value="{{ old('no_ktp') }}"
                                           class="form-control @error('no_ktp') is-invalid @enderror">
                                    @error('no_ktp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                {{-- NAMA --}}
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Nama Lengkap</label>
                                    <input type="text" name="nama"
                                           value="{{ old('nama') }}"
                                           class="form-control @error('nama') is-invalid @enderror">
                                    @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                {{-- JENIS KELAMIN --}}
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-select">
                                        <option value="">-- Pilih --</option>
                                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>

                                {{-- AGAMA --}}
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Agama</label>
                                    <input type="text" name="agama"
                                           value="{{ old('agama') }}"
                                           class="form-control">
                                </div>

                                {{-- PEKERJAAN --}}
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Pekerjaan</label>
                                    <input type="text" name="pekerjaan"
                                           value="{{ old('pekerjaan') }}"
                                           class="form-control">
                                </div>

                                {{-- TELP --}}
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">No Telp</label>
                                    <input type="text" name="telp"
                                           value="{{ old('telp') }}"
                                           class="form-control">
                                </div>

                                {{-- EMAIL --}}
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Email</label>
                                    <input type="email" name="email"
                                           value="{{ old('email') }}"
                                           class="form-control">
                                </div>

                                {{-- BUTTON --}}
                                <div class="col-12 text-center mt-4">

                                    @auth
                                        @if(auth()->user()->role === 'Admin')
                                            <button type="submit" class="btn btn-primary px-5 me-2">
                                                <i class="fa-solid fa-floppy-disk me-1"></i> Simpan
                                            </button>
                                        @else
                                            <p class="text-danger fw-semibold">
                                                Anda tidak memiliki izin menambah data warga.
                                            </p>
                                        @endif
                                    @endauth

                                    <a href="{{ route('warga.index') }}" class="btn btn-secondary px-5">
                                        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                                    </a>
                                </div>

                            </div>
                        </form>

                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection
