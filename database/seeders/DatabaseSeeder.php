<?php
namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Tambahkan ini untuk men-seed semua tabel lainnya
        $this->call([
            CreateFirstUser::class,
            CreateWargaDummy::class,
            CreateProyekSeeder::class,
            CreateLokasiProyekSeeder::class, // relasi proyek → lokasi
            TahapanProyekSeeder::class,      // relasi proyek → tahapan
            ProgresProyekSeeder::class,      // relasi proyek & tahapan → progres
            KontraktorSeeder::class,         // relasi proyek → kontraktor
        ]);
    }
}
