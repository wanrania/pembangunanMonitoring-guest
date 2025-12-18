<?php

namespace Database\Seeders;

use App\Models\ProgresProyek;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProgresProyekSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Catatan progres proyek (Bahasa Indonesia)
        $catatanProgres = [
            'Pekerjaan berjalan sesuai dengan rencana yang telah ditetapkan.',
            'Progres pekerjaan mengalami sedikit keterlambatan karena kondisi cuaca.',
            'Pelaksanaan pekerjaan berjalan lancar tanpa kendala berarti.',
            'Pekerjaan masih dalam tahap penyesuaian di lapangan.',
            'Sebagian pekerjaan telah selesai dan memasuki tahap lanjutan.',
            'Progres pekerjaan sesuai dengan target yang direncanakan.',
            'Terdapat kendala teknis namun masih dapat ditangani.',
            'Pelaksanaan pekerjaan menunjukkan peningkatan yang signifikan.',
            'Pekerjaan hampir selesai dan memasuki tahap akhir.',
            'Pekerjaan telah diselesaikan sesuai dengan spesifikasi.',
        ];

        for ($i = 1; $i <= 1000; $i++) {
            ProgresProyek::create([
                'proyek_id'   => rand(1, 20),
                'tahap_id'    => rand(1, 10),
                'persen_real' => $faker->randomFloat(2, 0, 100),
                'tanggal'     => $faker->date(),
                'catatan'     => $faker->randomElement($catatanProgres),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
