<?php
namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateWargaDummy extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        foreach (range(1, 1000) as $index) {

            DB::table('warga')->insert([
                'no_ktp'        => $faker->unique()->nik(),
                'nama'          => $faker->name,
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'agama'         => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu', null]),
                'pekerjaan'     => $faker->randomElement(['Karyawan', 'Wiraswasta', 'Mahasiswa', 'Guru', 'Petani', null]),
                'telp'          => $faker->phoneNumber(),
                'email'         => "warga{$index}@example.com", // email aman
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }
        
    }
}
