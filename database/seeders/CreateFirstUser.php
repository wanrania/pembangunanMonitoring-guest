<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateFirstUser extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        foreach (range(1, 1000) as $index) {

            // Email selalu unik
            $email = strtolower(str_replace(' ', '', $faker->name)) . $index . '@example.com';

            DB::table('users')->insert([
                'name'       => $faker->name,
                'email'      => $email,
                'password'   => Hash::make('password123'),
                'role'       => 'Staff',   // 👈 DEFAULT USER
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Akun ADMIN
        DB::table('users')->insert([
            'name'       => 'Admin',
            'email'      => 'admin@example.com',
            'password'   => Hash::make('admin12345'),
            'role'       => 'Admin',   // 👈 ROLE ADMIN
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
