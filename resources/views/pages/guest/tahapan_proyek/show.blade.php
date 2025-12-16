@extends('layouts.guest.app')

@section('content')

<!-- Header -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4">
            Detail Tahapan Proyek
        </h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('tahapan.index') }}">Tahapan Proyek</a>
            </li>
            <li class="breadcrumb-item active text-secondary">
                Detail
            </li>
        </ol>
    </div>
</div>

<!-- Content -->
<div class="container-fluid feature bg-light py-5">
    <div class="container py-5">

        <div class="row justify-content-center">
            <div class="col-lg-6">

                <div class="feature-item border p-5">

                    <h4 class="text-center mb-4 fw-bold">
                        {{ $tahapan->nama_tahap }}
                    </h4>

                    <table class="table table-bordered">
                        <tr>
                            <th width="40%">ID Tahap</th>
                            <td>{{ $tahapan->tahap_id }}</td>
                        </tr>
                        <tr>
                            <th>Nama Proyek</th>
                            <td>{{ $tahapan->proyek->nama_proyek }}</td>
                        </tr>
                        <tr>
                            <th>Target Persen</th>
                            <td>{{ $tahapan->target_persen }}%</td>
                        </tr>
                        <tr>
                            <th>Tanggal Mulai</th>
                            <td>{{ $tahapan->tgl_mulai }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Selesai</th>
                            <td>{{ $tahapan->tgl_selesai }}</td>
                        </tr>
                    </table>

                    <div class="text-center mt-4">
                        <a href="{{ route('tahapan.index') }}"
                           class="btn btn-outline-secondary">
                            Kembali
                        </a>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

@endsection
