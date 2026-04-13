<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
            'password'          => 'hashed',
        ];
    }

    public function novels()
    {
        return $this->hasMany(Novel::class, 'author_id');
    }

    // ── FAVORITES (Bookmark) ──────────────────────────────
    public function favorites()
    {
        return $this->belongsToMany(
            Novel::class,
            'favorites',
            'user_id',
            'novel_id'
        )->withTimestamps();
    }

    // ── READLIST ──────────────────────────────────────────
    public function readlist()
    {
        return $this->belongsToMany(
            Novel::class,
            'readlists',
            'user_id',
            'novel_id'
        )->withTimestamps();
    }

    // ── READING HISTORY ───────────────────────────────────
    public function readingHistories()
    {
        return $this->hasMany(ReadingHistory::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function readlists()
{
    return $this->hasMany(\App\Models\Readlist::class);
}
}