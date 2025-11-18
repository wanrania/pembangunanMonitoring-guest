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
        // Seed user
        User::factory()->create([
            'name'  => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Tambahkan ini untuk men-seed semua tabel lainnya
        $this->call([
            CreateWargaDummy::class,
            CreateProyekSeeder::class,
            CreateLokasiProyekSeeder::class, // relasi proyek → lokasi
        ]);
    }
}
