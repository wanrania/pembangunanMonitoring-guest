<?php
namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateWargaDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create('id_ID'); // Locale Indonesia

        foreach (range(1, 100) as $index) {

            // --- buat data nullable dulu di sini ---
            $email = $faker->safeEmail();
            if ($faker->boolean(40)) { // 40% peluang NULL
                $email = null;
            }

            $telp = $faker->phoneNumber();
            if ($faker->boolean(40)) {
                $telp = null;
            }

            // --- baru lakukan insert ---
            DB::table('warga')->insert([
                'no_ktp'        => $faker->unique()->nik(),
                'nama'          => $faker->name,
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'agama'         => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu', null]),
                'pekerjaan'     => $faker->randomElement(['Karyawan', 'Wiraswasta', 'Mahasiswa', 'Guru', 'Petani', null]),
                'telp'          => $telp,
                'email'         => $email,
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }

    }
}
