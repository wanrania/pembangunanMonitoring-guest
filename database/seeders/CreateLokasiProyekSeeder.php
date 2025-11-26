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
            dd("ERROR: Tabel proyek kosong. Jalankan CreateProyekSeeder dulu!");
        }

        foreach (range(1, 1000) as $i) {

            $proyek_id = $faker->randomElement($proyekIds);

            DB::table('lokasi_proyek')->insert([
                'proyek_id' => $proyek_id,
                'lat'       => $faker->latitude(-11, 6),
                'lng'       => $faker->longitude(95, 141),
                'geojson'   => json_encode([
                    "type" => "Point",
                    "coordinates" => [
                        (float)$faker->longitude(95, 141),
                        (float)$faker->latitude(-11, 6)
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
