<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CreateProyekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // DAFTAR NAMA PROYEK PEMBANGUNAN (INDONESIA)
        $namaProyekList = [
            'Pembangunan Jalan Nasional',
            'Pembangunan Jembatan Penghubung',
            'Pembangunan Gedung Kantor Pemerintah',
            'Pembangunan Rumah Sakit Daerah',
            'Pembangunan Sekolah Menengah Terpadu',
            'Pembangunan Pasar Rakyat',
            'Pembangunan Terminal Transportasi',
            'Pembangunan Instalasi Air Bersih',
            'Pembangunan Drainase Perkotaan',
            'Pembangunan Perumahan Rakyat',
            'Pembangunan Kawasan Wisata',
            'Pembangunan Gedung Serbaguna',
            'Pembangunan Sarana Olahraga',
            'Pembangunan Jalan Lingkungan',
            'Pembangunan Jaringan Irigasi',
            'Pembangunan Pusat Pelayanan Publik',
            'Pembangunan Balai Pelatihan Kerja',
            'Pembangunan Taman Kota',
            'Pembangunan Pelabuhan Rakyat',
            'Pembangunan Infrastruktur Desa',
        ];

        // TEMPLATE DESKRIPSI (INDONESIA)
        $deskripsiList = [
            'Proyek ini bertujuan untuk meningkatkan kualitas infrastruktur guna mendukung aktivitas masyarakat setempat.',
            'Pelaksanaan proyek dilakukan untuk menunjang pembangunan daerah yang berkelanjutan.',
            'Proyek pembangunan ini diharapkan dapat meningkatkan pelayanan publik secara optimal.',
            'Pembangunan ini difokuskan pada peningkatan aksesibilitas dan kenyamanan masyarakat.',
            'Proyek ini merupakan bagian dari upaya pemerintah dalam pemerataan pembangunan daerah.',
            'Kegiatan pembangunan dilaksanakan sesuai dengan standar teknis dan peraturan yang berlaku.',
            'Proyek ini bertujuan untuk meningkatkan kesejahteraan masyarakat melalui pembangunan infrastruktur.',
        ];

        foreach (range(1, 1000) as $index) {

            // kode proyek unik
            $kodeProyek = 'PRY-' . str_pad($index, 4, '0', STR_PAD_LEFT);

            // lokasi Indonesia
            $lokasi = $faker->city . ', ' . $faker->state;

            // anggaran (format rupiah)
            $anggaran = 'Rp ' . number_format(
                $faker->numberBetween(100000000, 5000000000),
                0,
                ',',
                '.'
            );

            // sumber dana
            $sumberDana = $faker->randomElement([
                'APBN',
                'APBD',
                'Dana Desa',
                'CSR Perusahaan',
                'Dana Hibah',
                'Swadaya Masyarakat',
            ]);

            DB::table('proyek')->insert([
                'kode_proyek' => $kodeProyek,
                'nama_proyek' => $faker->randomElement($namaProyekList),
                'tahun'       => $faker->numberBetween(2005, 2025),
                'lokasi'      => $lokasi,
                'anggaran'    => $anggaran,
                'sumber_dana' => $sumberDana,
                'deskripsi'   => $faker->randomElement($deskripsiList),
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
