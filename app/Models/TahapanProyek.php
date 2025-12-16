<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TahapanProyek extends Model
{
    use HasFactory;

    protected $table      = 'tahapan_proyek';
    protected $primaryKey = 'tahap_id';

    protected $fillable = [
        'proyek_id',
        'nama_tahap',
        'target_persen',
        'tgl_mulai',
        'tgl_selesai',
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'proyek_id', 'proyek_id');
    }

    public function scopeFilter(Builder $query, Request $request, array $filterable)
    {
        foreach ($filterable as $field) {
            if ($request->filled($field)) {
                $query->where($field, $request->$field);
            }
        }
        return $query;
    }

    public function scopeSearch($query, $request, array $searchable)
    {
        if ($request->filled('search')) {
            $query->whereHas('proyek', function ($q) use ($request) {
                $q->where('nama_proyek', 'like', '%' . $request->search . '%');
            });
        }
    }

}
