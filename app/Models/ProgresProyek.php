<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ProgresProyek extends Model
{
    protected $table      = 'progres_proyek';
    protected $primaryKey = 'progres_id';

    protected $fillable = [
        'proyek_id',
        'tahap_id',
        'persen_real',
        'tanggal',
        'catatan',
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'proyek_id');
    }

    public function tahap()
    {
        return $this->belongsTo(TahapanProyek::class, 'tahap_id');
    }

    /* MEDIA GLOBAL */
    public function media()
{
    return $this->hasMany(Media::class, 'ref_id', 'progres_id')
        ->where('ref_table', 'progres_proyek')
        ->orderBy('sort_order');
}


    public function scopeFilter(Builder $query, $request, array $filterable)
    {
        foreach ($filterable as $column) {

            if ($request->filled($column)) {

                // khusus tanggal (date)
                if ($column === 'tanggal') {
                    $query->whereDate($column, $request->$column);
                } else {
                    $query->where($column, $request->$column);
                }
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
