<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateLokasiProyekSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil semua proyek_id yang sudah ada
        $proyekIds = DB::table('proyek')->pluck('proyek_id')->toArray();

        // Cegah error foreign key
        if (empty($proyekIds)) {
            dd("ERROR: Tabel proyek kosong. Jalankan CreateProyekSeeder terlebih dahulu!");
        }

        // Keterangan lokasi (Bahasa Indonesia)
        $keteranganLokasi = [
            'Lokasi proyek berada di kawasan strategis wilayah perkotaan.',
            'Lokasi proyek terletak di area permukiman masyarakat.',
            'Lokasi proyek berada di wilayah pengembangan infrastruktur daerah.',
            'Lokasi proyek mudah diakses melalui jalan utama.',
            'Lokasi proyek berada di wilayah administratif pemerintah daerah.',
            'Lokasi proyek terletak di kawasan yang sedang berkembang.',
        ];

        foreach (range(1, 1000) as $i) {

            $lat = $faker->latitude(-11, 6);
            $lng = $faker->longitude(95, 141);

            DB::table('lokasi_proyek')->insert([
                'proyek_id' => $faker->randomElement($proyekIds),
                'lat'       => $lat,
                'lng'       => $lng,
                'geojson'   => json_encode([
                    "type" => "Point",
                    "coordinates" => [
                        (float) $lng,
                        (float) $lat
                    ]
                ]),

                // TAMBAHAN (jika kolom tersedia di tabel)
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
