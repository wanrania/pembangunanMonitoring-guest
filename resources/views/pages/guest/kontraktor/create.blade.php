@extends('layouts.guest.app')

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown">Tambah Kontraktor</h4>

        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('kontraktor.index') }}">Kontraktor</a></li>
            <li class="breadcrumb-item active text-secondary">Tambah</li>
        </ol>
    </div>
</div>
<!-- Header End -->

<!-- FORM START -->
<div class="container py-5">
    <div class="row justify-content-center">

        <div class="col-lg-8 wow fadeInUp">

            <div class="team-item border border-primary p-1">

                <!-- BORDER STYLE -->
                <div class="team-border-style-1"></div>
                <div class="team-border-style-2"></div>
                <div class="team-border-style-3"></div>
                <div class="team-border-style-4"></div>

                <div class="bg-white p-4 p-md-5">

                    <form action="{{ route('kontraktor.store') }}" method="POST">
                        @csrf

                        <div class="row g-3">

                            <!-- NAMA KONTRAKTOR -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nama Kontraktor</label>
                                <input type="text" name="nama"
                                       class="form-control @error('nama') is-invalid @enderror"
                                       value="{{ old('nama') }}"
                                       placeholder="Nama perusahaan / kontraktor">
                                @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- PENANGGUNG JAWAB -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Penanggung Jawab</label>
                                <input type="text" name="penanggung_jawab"
                                       class="form-control @error('penanggung_jawab') is-invalid @enderror"
                                       value="{{ old('penanggung_jawab') }}"
                                       placeholder="Nama penanggung jawab">
                                @error('penanggung_jawab')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- KONTAK -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Kontak</label>
                                <input type="text" name="kontak"
                                       class="form-control @error('kontak') is-invalid @enderror"
                                       value="{{ old('kontak') }}"
                                       placeholder="No. HP / Email">
                                @error('kontak')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- PROYEK -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Proyek</label>
                                <select name="proyek_id" class="form-select @error('proyek_id') is-invalid @enderror">
                                    <option value="">— Pilih Proyek —</option>
                                    @foreach ($proyek as $p)
                                        <option value="{{ $p->proyek_id }}"
                                            {{ old('proyek_id') == $p->proyek_id ? 'selected' : '' }}>
                                            {{ $p->nama_proyek }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('proyek_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- ALAMAT -->
                            <div class="col-12">
                                <label class="form-label fw-semibold">Alamat</label>
                                <textarea name="alamat" rows="4"
                                          class="form-control"
                                          placeholder="Alamat kontraktor">{{ old('alamat') }}</textarea>
                            </div>

                            <!-- BUTTON -->
                            <div class="col-12 text-center mt-4">

                                <a href="{{ route('kontraktor.index') }}" class="btn btn-secondary px-5 me-2">
                                    Kembali
                                </a>

                                @auth
                                    @if(auth()->user()->role === 'Admin')
                                        <button type="submit" class="btn btn-primary px-5">
                                            Simpan
                                        </button>
                                    @else
                                        <p class="text-danger fw-semibold mt-2">
                                            Anda tidak memiliki izin menambah data kontraktor.
                                        </p>
                                    @endif
                                @endauth

                            </div>

                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>
</div>
<!-- FORM END -->

@endsection
