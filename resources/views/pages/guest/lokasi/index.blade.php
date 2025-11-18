@extends('layouts.guest.app')

@section('content')
<main class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-primary">Daftar Lokasi</h3>
            <a href="{{ route('lokasi.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus me-1"></i> Tambah Lokasi
            </a>

        </div>

    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
    @if(session('update')) <div class="alert alert-warning">{{ session('update') }}</div> @endif
    @if(session('delete')) <div class="alert alert-danger">{{ session('delete') }}</div> @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Proyek</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>GeoJSON</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($lokASI as $item)
            <tr>
                <td>{{ $item->proyek->nama_proyek }}</td>
                <td>{{ $item->lat }}</td>
                <td>{{ $item->lng }}</td>
                <td>{{ $item->geojason }}</td>

                {{-- <div class="card-footer bg-transparent border-0 d-flex justify-content-between p-3">
                            <a href="{{ route('lokasi.edit', $item->lokasi_id) }}" class="btn btn-warning btn-sm">
                                <i class="fa-solid fa-pen-to-square me-1"></i> Edit
                            </a>

                            <form action="{{ route('proyek.destroy', $proyek->proyek_id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa-solid fa-trash-can me-1"></i> Hapus
                                </button>
                            </form>

                        </div> --}}
                 <td>
                    <a href="{{ route('lokasi.edit', $item->lokasi_id) }}" class="btn btn-warning btn-sm">
                                <i class="fa-solid fa-pen-to-square me-1"></i> Edit
                            </a>

                    <form action="{{ route('lokasi.destroy', $item->lokasi_id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa-solid fa-trash-can me-1"></i> Hapus
                                </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

</main>
@endsection
