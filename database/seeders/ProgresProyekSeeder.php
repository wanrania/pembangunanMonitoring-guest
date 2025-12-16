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

        for ($i = 1; $i <= 1000; $i++) {
            ProgresProyek::create([
                'proyek_id'   => rand(1, 20),
                'tahap_id'    => rand(1, 10),
                'persen_real' => $faker->randomFloat(2, 0, 100),
                'tanggal'     => $faker->date(),
                'catatan'     => $faker->sentence(10),
            ]);
        }
    }
}
