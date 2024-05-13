<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\M_JenisEdukasi;
use App\Models\SubMateriEdukasi;

class MateriEdukasi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['judul_materi','jenis_id'];

    public function jenisEdukasi(): BelongsTo
    {
        return $this->belongsTo(M_JenisEdukasi::class, 'jenis_id','id');
    }

    public function subMateri(): HasMany
    {
        return $this->hasMany(SubMateriEdukasi::class,'materi_id');
    }
}
