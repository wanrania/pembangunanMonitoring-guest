<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TahapanProyek;
use App\Models\Proyek;
use Faker\Factory as Faker;

class TahapanProyekSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil semua proyek_id yang ada
        $proyekIds = Proyek::pluck('proyek_id')->toArray();

        // Nama tahapan yang umum dipakai (Bahasa Indonesia)
        $tahapan = [
            'Perencanaan',
            'Persiapan Administrasi',
            'Pekerjaan Awal',
            'Pelaksanaan Pekerjaan',
            'Pengawasan Lapangan',
            'Finishing dan Penyelesaian',
            'Evaluasi dan Serah Terima',
        ];

        // Keterangan tahapan (opsional – Bahasa Indonesia)
        $keteranganTahap = [
            'Tahap penyusunan rencana kerja dan kebutuhan proyek.',
            'Tahap pengurusan administrasi dan persiapan lapangan.',
            'Tahap awal pelaksanaan pekerjaan fisik proyek.',
            'Tahap utama pelaksanaan pembangunan sesuai rencana.',
            'Tahap pengawasan untuk memastikan pekerjaan sesuai spesifikasi.',
            'Tahap penyelesaian akhir dan perapihan hasil pekerjaan.',
            'Tahap evaluasi hasil pekerjaan dan serah terima proyek.',
        ];

        for ($i = 0; $i < 1000; $i++) {

            // tanggal mulai & selesai
            $tglMulai = $faker->dateTimeBetween('-1 year', 'now');
            $tglSelesai = $faker->dateTimeBetween($tglMulai, '+3 months');

            TahapanProyek::create([
                'proyek_id'      => $faker->randomElement($proyekIds),
                'nama_tahap'     => $faker->randomElement($tahapan),
                'target_persen'  => $faker->randomFloat(2, 5, 100),
                'tgl_mulai'      => $tglMulai->format('Y-m-d'),
                'tgl_selesai'    => $tglSelesai->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
