<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* Data dummy sesuai tabel */
        $data['proyek'] = [
            'kode_proyek'  => 'PRJ-001',
            'nama_proyek'  => 'Pembangunan Gedung Serbaguna',
            'tahun'        => 2025,
            'lokasi'       => 'Jakarta',
            'anggaran'     => 1500000000,
            'sumber_dana'  => 'APBD',
            'deskripsi'    => 'Pembangunan gedung serbaguna untuk masyarakat.',
            'dokumen'      => 'images/dokumen_proyek.png' // contoh file di public/images
        ];

        $data['tahapan_proyek'] = [
            ['nama_tahap' => 'Perencanaan', 'target_persen' => 20, 'tgl_mulai' => '2025-01-10', 'tgl_selesai' => '2025-02-15'],
            ['nama_tahap' => 'Pondasi',     'target_persen' => 30, 'tgl_mulai' => '2025-02-16', 'tgl_selesai' => '2025-03-30'],
            ['nama_tahap' => 'Struktur',    'target_persen' => 50, 'tgl_mulai' => '2025-04-01', 'tgl_selesai' => '2025-06-30'],
        ];

        $data['progres_proyek'] = [
            ['persen_real' => 10, 'tanggal' => '2025-01-20', 'catatan' => 'Survey lokasi selesai', 'foto' => 'images/progres1.jpg'],
            ['persen_real' => 25, 'tanggal' => '2025-03-01', 'catatan' => 'Pondasi sudah 80%', 'foto' => 'images/progres2.jpg'],
            ['persen_real' => 40, 'tanggal' => '2025-04-20', 'catatan' => 'Struktur mulai dikerjakan', 'foto' => 'images/progres3.jpg'],
        ];

        $data['lokasi_proyek'] = [
            'lat' => -6.200000,
            'lng' => 106.816666,
            'geojson' => 'Data geojson lokasi proyek',
            'peta' => 'images/map.png'
        ];

        $data['kontraktor'] = [
            'nama'            => 'PT. Maju Jaya',
            'penanggung_jawab'=> 'Budi Santoso',
            'kontak'          => '0812-3456-7890',
            'alamat'          => 'Jl. Merdeka No. 123, Jakarta'
        ];

        return view('guest.home', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
