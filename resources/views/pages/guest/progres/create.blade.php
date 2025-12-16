@extends('layouts.guest.app')

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown">Tambah Progres Proyek</h4>

        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('progres.index') }}">Progres Proyek</a></li>
            <li class="breadcrumb-item active text-secondary">Tambah</li>
        </ol>
    </div>
</div>
<!-- Header End -->

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-8 wow fadeInUp">

            <div class="project-item p-4 border rounded shadow-sm">

                <form action="{{ route('progres.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">

                        {{-- PROYEK --}}
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Proyek</label>
                            <select name="proyek_id" class="form-select @error('proyek_id') is-invalid @enderror">
                                <option value="">-- Pilih Proyek --</option>
                                @foreach ($proyek as $p)
                                    <option value="{{ $p->proyek_id }}" {{ old('proyek_id') == $p->proyek_id ? 'selected' : '' }}>
                                        {{ $p->nama_proyek }}
                                    </option>
                                @endforeach
                            </select>
                            @error('proyek_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- TAHAP --}}
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Tahap</label>
                            <select name="tahap_id" class="form-select @error('tahap_id') is-invalid @enderror">
                                <option value="">-- Pilih Tahap --</option>
                                @foreach ($tahap as $t)
                                    <option value="{{ $t->tahap_id }}" {{ old('tahap_id') == $t->tahap_id ? 'selected' : '' }}>
                                        {{ $t->nama_tahap }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tahap_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- PERSEN --}}
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Persentase Progres (%)</label>
                            <input type="number" name="persen_real"
                                   class="form-control @error('persen_real') is-invalid @enderror"
                                   value="{{ old('persen_real') }}"
                                   min="0" max="100" placeholder="0 - 100">
                            @error('persen_real') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- TANGGAL --}}
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Tanggal</label>
                            <input type="date" name="tanggal"
                                   class="form-control @error('tanggal') is-invalid @enderror"
                                   value="{{ old('tanggal') }}">
                            @error('tanggal') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- CATATAN --}}
                        <div class="col-12">
                            <label class="form-label fw-bold">Catatan</label>
                            <textarea name="catatan" rows="4" class="form-control">{{ old('catatan') }}</textarea>
                        </div>

                        {{-- MEDIA --}}
                        <div class="col-12">
                            <label class="form-label fw-bold">Upload Foto (opsional)</label>
                            <input type="file" name="media[]" class="form-control" multiple>
                        </div>

                        {{-- BUTTON --}}
                        <div class="col-12 text-center mt-3">

                            <a href="{{ route('progres.index') }}" class="btn btn-secondary px-5 me-2">Kembali</a>

                            @auth
                                @if(auth()->user()->role === 'Admin')
                                    <button class="btn btn-primary px-5">Simpan</button>
                                @else
                                    <p class="text-danger fw-semibold mt-2">
                                        Anda tidak memiliki izin menambah progres.
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

@endsection
