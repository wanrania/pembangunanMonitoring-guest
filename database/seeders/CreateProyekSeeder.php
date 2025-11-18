<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateProyekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('proyek')->insert([
            [
                'kode_proyek' => 'PRY-001',
                'nama_proyek' => 'Pembangunan Jalan Desa',
                'tahun'       => '2025-01-01',
                'lokasi'      => 'Desa Makmur',
                'anggaran'    => '150000000',
                'sumber_dana' => 'APBD',
                'deskripsi'   => 'Pembangunan jalan utama sepanjang 2 km.',
                'media'       => null,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'kode_proyek' => 'PRY-002',
                'nama_proyek' => 'Renovasi Balai Desa',
                'tahun'       => '2025-02-01',
                'lokasi'      => 'Desa Sejahtera',
                'anggaran'    => '75000000',
                'sumber_dana' => 'Dana Desa',
                'deskripsi'   => 'Renovasi total gedung balai desa.',
                'media'       => null,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);

    }
}
