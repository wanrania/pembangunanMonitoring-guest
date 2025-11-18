<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokasiProyek extends Model
{
    use HasFactory;

    protected $table      = 'lokasi_proyek';
    protected $primaryKey = 'lokasi_id';
    public $incrementing  = true;
    protected $keyType    = 'int';

    protected $fillable = [
        'proyek_id',
        'lat',
        'lng',
        'geojson',
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'proyek_id', 'proyek_id');
    }
}
