<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\ulasan_edukasi;
use App\Models\rating_edukasi;
use App\Models\role;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'email',
        'password',
        'super_password',
        'roles_id   ',
        'nomor_handphone',
        'gender',
        'foto_profil',
        'alamat',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'super_password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        // Logic to determine if the user is an admin
        return false;
    }

    public function isGov()
    {
        // Logic to determine if the user is a government official
        return false;
    }

    public function isUser()
    {
        // Logic to determine if the user is a regular user
        return true;
    }
    public function ulasan(): HasMany
    {
        return $this->hasMany(ulasan_edukasi::class,'sub_id');
    }
    public function rating(): HasMany
    {
        return $this->hasMany(rating_edukasi::class,'sub_id');
    }
    public function role(): BelongsTo
    {
        return $this->belongsTo(role::class,'roles_id');
    }
}
