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

        foreach (range(1, 1000) as $index) {

            // kode proyek unik
            $kodeProyek = 'PRY-' . str_pad($index, 4, '0', STR_PAD_LEFT);

            // lokasi Indonesia
            $lokasi = $faker->city . ', ' . $faker->state;

            // anggaran (format rupiah)
            $anggaran = 'Rp ' . number_format($faker->numberBetween(50000000, 5000000000), 0, ',', '.');

            // sumber dana
            $sumberDana = $faker->randomElement([
                'APBN',
                'APBD',
                'Dana Hibah',
                'CSR Perusahaan',
                'Swadaya Masyarakat',
                'Dana Desa',
            ]);

            DB::table('proyek')->insert([
                'kode_proyek' => $kodeProyek,
                'nama_proyek' => 'Proyek ' . $faker->words(3, true),
                'tahun'       => $faker->year,
                'lokasi'      => $lokasi,
                'anggaran'    => $anggaran,
                'sumber_dana' => $sumberDana,
                'deskripsi'   => $faker->sentence(12),
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
