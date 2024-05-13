<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;

class role extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user(): HasMany
    {
        return $this->hasMany(User::class,'roles_id','id');
    }
}
