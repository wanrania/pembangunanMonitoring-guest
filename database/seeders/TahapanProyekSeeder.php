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

        // Nama tahapan yang umum dipakai
        $tahapan = [
            'Perencanaan',
            'Persiapan',
            'Pekerjaan Awal',
            'Pelaksanaan',
            'Pengawasan',
            'Finishing',
            'Evaluasi',
        ];

        for ($i = 0; $i < 1000; $i++) {

            // tanggal mulai & selesai
            $tglMulai = $faker->dateTimeBetween('-1 year', 'now');
            $tglSelesai = $faker->dateTimeBetween($tglMulai, '+3 months');

            TahapanProyek::create([
                'proyek_id'     => $faker->randomElement($proyekIds),
                'nama_tahap'    => $faker->randomElement($tahapan),
                'target_persen' => $faker->randomFloat(2, 5, 100),
                'tgl_mulai'     => $tglMulai->format('Y-m-d'),
                'tgl_selesai'   => $tglSelesai->format('Y-m-d'),
            ]);
        }
    }
}
