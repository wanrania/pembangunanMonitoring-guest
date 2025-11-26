<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    public function scopeFilter(Builder $query, $request, array $filterable)
    {
        foreach ($filterable as $column) {
            if ($request->filled($column)) {
                $query->where($column, $request->$column);
            }
        }
        return $query;
    }

    public function scopeSearch($query, $request, array $columns)
    {
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request, $columns) {
                foreach ($columns as $column) {
                    $q->orWhere($column, 'LIKE', '%' . $request->search . '%');
                }
            });
        }
    }
}
