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

        // Nama perusahaan kontraktor (Bahasa Indonesia)
        $namaKontraktor = [
            'PT Karya Bangun Nusantara',
            'PT Cipta Konstruksi Sejahtera',
            'PT Mitra Pembangunan Indonesia',
            'PT Bina Infrastruktur Utama',
            'PT Sinar Karya Mandiri',
            'PT Adhi Konstruksi Raya',
            'PT Graha Teknik Persada',
            'PT Nusantara Jaya Konstruksi',
            'PT Prima Karya Sejahtera',
            'PT Putra Mandiri Konstruksi',
        ];

        // Jabatan penanggung jawab
        $jabatanPJ = [
            'Direktur Proyek',
            'Manajer Proyek',
            'Kepala Pelaksana',
            'Penanggung Jawab Lapangan',
        ];

        foreach (range(1, 1000) as $i) {
            Kontraktor::create([
                'proyek_id' => $faker->randomElement($proyekIds),
                'nama' => $faker->randomElement($namaKontraktor),
                'penanggung_jawab' => $faker->name . ' - ' . $faker->randomElement($jabatanPJ),
                'kontak' => $faker->phoneNumber,
                'alamat' => $faker->streetAddress . ', ' . $faker->city . ', ' . $faker->state,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
