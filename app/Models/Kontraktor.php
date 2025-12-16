<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontraktor extends Model
{
    use HasFactory;

    protected $table = 'kontraktor';
    protected $primaryKey = 'kontraktor_id';
    public $incrementing = true;

    protected $fillable = [
        'proyek_id',
        'nama',
        'penanggung_jawab',
        'kontak',
        'alamat',
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'proyek_id');
    }

    // SCOPE FILTER
    public function scopeFilter(Builder $query, $request, array $filterable)
    {
        foreach ($filterable as $column) {
            if ($request->filled($column)) {
                $query->where($column, 'LIKE', '%' . $request->$column . '%');
            }
        }

        return $query;
    }

    // SCOPE SEARCH
    public function scopeSearch(Builder $query, $request, array $columns)
    {
        if ($request->filled('search')) {
            $query->where(function ($q) use ($columns, $request) {
                foreach ($columns as $column) {
                    $q->orWhere($column, 'LIKE', '%' . $request->search . '%');
                }
            });
        }

        return $query;
    }
}
