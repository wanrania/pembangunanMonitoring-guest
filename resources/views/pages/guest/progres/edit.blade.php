@extends('layouts.guest.app')

@section('content')
    <!-- Header -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown">Edit Progres Proyek</h4>

            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('progres.index') }}">Progres Proyek</a></li>
                <li class="breadcrumb-item active text-secondary">Edit</li>
            </ol>
        </div>
    </div>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 wow fadeInUp">

                <div class="project-item p-4 border rounded shadow-sm">

                    <form action="{{ route('progres.update', $data->progres_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">

                            {{-- PROYEK --}}
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Proyek</label>
                                <select name="proyek_id" class="form-select">
                                    @foreach ($proyek as $p)
                                        <option value="{{ $p->proyek_id }}" {{ $data->proyek_id == $p->proyek_id ? 'selected' : '' }}>
                                            {{ $p->nama_proyek }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- TAHAP --}}
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Tahap</label>
                                <select name="tahap_id" class="form-select">
                                    @foreach ($tahap as $t)
                                        <option value="{{ $t->tahap_id }}" {{ $data->tahap_id == $t->tahap_id ? 'selected' : '' }}>
                                            {{ $t->nama_tahap }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- PERSEN REAL --}}
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Persentase Progres (%)</label>
                                <input type="number" name="persen_real" class="form-control"
                                       value="{{ $data->persen_real }}" min="0" max="100">
                            </div>

                            {{-- TANGGAL --}}
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" value="{{ $data->tanggal }}">
                            </div>

                            {{-- CATATAN --}}
                            <div class="col-12">
                                <label class="form-label fw-bold">Catatan</label>
                                <textarea name="catatan" rows="4" class="form-control">{{ $data->catatan }}</textarea>
                            </div>

                            {{-- MEDIA --}}
                            <div class="col-12">
                                <label class="form-label fw-bold">Upload Foto Tambahan (opsional)</label>
                                <input type="file" name="media[]" class="form-control" multiple>
                            </div>

                            {{-- BUTTONS --}}
                            <div class="col-12 text-center mt-4">

                                {{-- Tombol Update hanya untuk Admin --}}
                                @auth
                                    @if(auth()->user()->role === 'Admin')
                                        <button class="btn btn-warning px-4">
                                            <i class="fa fa-save me-1"></i> Update
                                        </button>
                                    @else
                                        <p class="text-danger fw-semibold m-0">
                                            Anda tidak memiliki izin untuk memperbarui proyek.
                                        </p>
                                    @endif
                                @endauth

                                <a href="{{ route('progres.index') }}" class="btn btn-secondary px-5">Kembali</a>

                            </div>

                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
