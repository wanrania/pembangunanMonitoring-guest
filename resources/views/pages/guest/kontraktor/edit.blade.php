@extends('layouts.guest.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">
                Edit Kontraktor
            </h4>

            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('kontraktor.index') }}">Kontraktor</a></li>
                <li class="breadcrumb-item active text-secondary">Edit</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.2s">
                <div class="team-item border border-primary p-1">
                    <!-- Border Animation -->
                    <div class="team-border-style-1"></div>
                    <div class="team-border-style-2"></div>
                    <div class="team-border-style-3"></div>
                    <div class="team-border-style-4"></div>

                    <div class="bg-white p-4 p-md-5">

                        {{-- pastikan variabel ada, kalau tidak tampil pesan --}}
                        @if (!isset($data) || !isset($proyek))
                            <div class="alert alert-danger">
                                Data tidak lengkap. Pastikan controller mengirim <strong>$data</strong> dan <strong>$proyek</strong>.
                            </div>
                        @else

                            @if ($errors->any())
                                <div class="alert alert-danger mb-3">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $err)
                                            <li>{{ $err }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('kontraktor.update', $data->kontraktor_id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row g-3">

                                    <!-- NAMA KONTRAKTOR -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Nama Kontraktor</label>
                                        <input type="text" name="nama"
                                            class="form-control @error('nama') is-invalid @enderror"
                                            value="{{ old('nama', $data->nama) }}" placeholder="Nama perusahaan">

                                        @error('nama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- PENANGGUNG JAWAB -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Penanggung Jawab</label>
                                        <input type="text" name="penanggung_jawab"
                                            class="form-control @error('penanggung_jawab') is-invalid @enderror"
                                            value="{{ old('penanggung_jawab', $data->penanggung_jawab) }}"
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
                                            value="{{ old('kontak', $data->kontak) }}" placeholder="Telepon / WA / Email">

                                        @error('kontak')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- PROYEK -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Proyek</label>
                                        <select name="proyek_id" class="form-select @error('proyek_id') is-invalid @enderror" required>
                                            <option value="">-- Pilih Proyek --</option>
                                            @foreach ($proyek as $p)
                                                <option value="{{ $p->proyek_id }}"
                                                    {{ (old('proyek_id', $data->proyek_id) == $p->proyek_id) ? 'selected' : '' }}>
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
                                        <textarea name="alamat" rows="4" class="form-control" placeholder="Alamat kontraktor">{{ old('alamat', $data->alamat) }}</textarea>
                                    </div>

                                    <!-- BUTTON -->
                                    <div class="col-12 text-center mt-4">

                                        {{-- Tombol Edit tidak perlu di halaman edit (hapus) --}}
                                        {{-- TOMBOL UPDATE hanya untuk Admin (Staff dilarang edit) --}}
                                        @auth
                                            @if (auth()->user()->role === 'Admin')
                                                <button type="submit" class="btn btn-primary px-5 me-2">
                                                    <i class="fa fa-save me-1"></i> Update
                                                </button>
                                            @else
                                                {{-- Non-admin tidak boleh mengupdate, tampilkan notif sederhana --}}
                                                <a href="{{ route('kontraktor.index') }}" class="btn btn-secondary px-5 me-2">
                                                    Kembali
                                                </a>
                                            @endif
                                        @endauth

                                        {{-- Jika guest (belum login), sembunyikan tombol update juga --}}
                                        @guest
                                            <a href="{{ route('kontraktor.index') }}" class="btn btn-secondary px-5">
                                                Kembali
                                            </a>
                                        @endguest

                                        {{-- Jika Admin, tampilkan tombol kembali juga (opsional) --}}
                                        @if(auth()->check() && auth()->user()->role === 'Admin')
                                            <a href="{{ route('kontraktor.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
                                        @endif
                                    </div>

                                </div>
                            </form>

                        @endif {{-- end cek data --}}
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
