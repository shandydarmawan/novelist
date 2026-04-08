<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // ✅ TAMBAHAN
use App\Models\Novel;
use App\Models\Favorite;
use App\Models\Comment;
use App\Models\Review;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable; // ✅ DIGABUNG (WAJIB)

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function novels()
    {
        return $this->hasMany(Novel::class, 'author_id');
    }

    public function favorites()
    {
        return $this->belongsToMany(
            \App\Models\Novel::class,
            'favorites'
        )->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function reviews()
    {
    return $this->hasMany(Review::class);
    }
}
