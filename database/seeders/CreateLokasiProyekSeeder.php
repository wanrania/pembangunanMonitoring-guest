<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Proyek;

class CreateLokasiProyekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $proyek1 = Proyek::where('kode_proyek', 'PRY-001')->first();
        $proyek2 = Proyek::where('kode_proyek', 'PRY-002')->first();

        DB::table('lokasi_proyek')->insert([
            [
                'proyek_id' => $proyek1->proyek_id,
                'lat'       => '-0.789275',
                'lng'       => '113.921327',
                'geojson'   => null,
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'proyek_id' => $proyek2->proyek_id,
                'lat'       => '-0.912928',
                'lng'       => '114.028373',
                'geojson'   => null,
                'created_at'=> now(),
                'updated_at'=> now(),
            ]
        ]);
    }
}
