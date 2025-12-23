<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateFirstUser extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            // ===== ADMIN (2 ORANG) =====
            [
                'name'       => 'Admin Utama',
                'email'      => 'admin@projek.id',
                'password'   => Hash::make('admin123'),
                'role'       => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Admin Sistem',
                'email'      => 'admin.sistem@projek.id',
                'password'   => Hash::make('admin123'),
                'role'       => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ===== USER (3 ORANG) =====
            [
                'name'       => 'Budi Santoso',
                'email'      => 'budi@projek.id',
                'password'   => Hash::make('password123'),
                'role'       => 'User',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Siti Rahmawati',
                'email'      => 'siti@projek.id',
                'password'   => Hash::make('password123'),
                'role'       => 'User',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Andi Pratama',
                'email'      => 'andi@projek.id',
                'password'   => Hash::make('password123'),
                'role'       => 'User',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ===== STAFF (5 ORANG) =====
            [
                'name'       => 'Rina Lestari',
                'email'      => 'rina@projek.id',
                'password'   => Hash::make('password123'),
                'role'       => 'Staff',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Dewi Anggraini',
                'email'      => 'dewi@projek.id',
                'password'   => Hash::make('password123'),
                'role'       => 'Staff',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Agus Setiawan',
                'email'      => 'agus@projek.id',
                'password'   => Hash::make('password123'),
                'role'       => 'Staff',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Fajar Nugroho',
                'email'      => 'fajar@projek.id',
                'password'   => Hash::make('password123'),
                'role'       => 'Staff',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Lina Marlina',
                'email'      => 'lina@projek.id',
                'password'   => Hash::make('password123'),
                'role'       => 'Staff',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
