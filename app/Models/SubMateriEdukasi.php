<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\MateriEdukasi;
use App\Models\ulasan_edukasi;

class SubMateriEdukasi extends Model
{
    use HasFactory;
    protected $guarded = [ 'id'];

    public function materiEdukasi(): BelongsTo
    {
        return $this->belongsTo(MateriEdukasi::class,'materi_id','id');
    }

    public function ulasan(): HasMany
    {
        return $this->hasMany(ulasan_edukasi::class,'sub_id');
    }
    public function rating(): HasMany
    {
        return $this->hasMany(rating_edukasi::class,'sub_id');
    }
}
