<?php

namespace Database\Seeders;

use App\Models\Proyek;
use App\Models\Kontraktor;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class KontraktorSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $proyekIds = Proyek::pluck('proyek_id')->toArray();

        foreach (range(1, 1000) as $i) {
            Kontraktor::create([
                'proyek_id' => $faker->randomElement($proyekIds),
                'nama' => $faker->company,
                'penanggung_jawab' => $faker->name,
                'kontak' => $faker->phoneNumber,
                'alamat' => $faker->address,
            ]);
        }
    }
}
