<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
     // Nama tabel
    protected $table = 'proyek';

    // Primary key
    protected $primaryKey = 'proyek_id';

    // Kolom yang boleh diisi (fillable)
    protected $fillable = [
        'kode_proyek',
        'nama_proyek',
        'tahun',
        'lokasi',
        'anggaran',
        'sumber_dana',
        'deskripsi',
    ];
}
