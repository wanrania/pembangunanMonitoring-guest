<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Proyek extends Model
{
    protected $table = 'proyek';
    protected $primaryKey = 'proyek_id';

    protected $fillable = [
        'kode_proyek',
        'nama_proyek',
        'tahun',
        'lokasi',
        'anggaran',
        'sumber_dana',
        'deskripsi',
    ];

    /* ================= MEDIA (TANPA FK) ================= */
    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'proyek_id')
            ->where('ref_table', 'proyek')
            ->orderBy('sort_order');
    }

    /* ================= FILTER ================= */
    public function scopeFilter(Builder $query, $request, array $filterable)
    {
        foreach ($filterable as $field) {
            if ($request->filled($field)) {
                $query->where($field, $request->$field);
            }
        }
        return $query;
    }

    /* ================= SEARCH ================= */
    public function scopeSearch(Builder $query, $request, array $searchable)
{
    if ($request->filled('search')) {
        $query->where(function ($q) use ($request, $searchable) {
            foreach ($searchable as $field) {
                $q->orWhere($field, 'like', '%' . $request->search . '%');
            }
        });
    }
    return $query;
}


}
