<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'author_id',
        'cover',
        'synopsis',
        'content',
        'status',
        'views',
        'likes',
    ];

    /* ================= RELATIONS ================= */

    // Novel milik satu kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Novel milik satu author (user)
   public function author()
{
    return $this->belongsTo(Author::class);
}

    // Novel punya banyak chapter
    public function chapters()
    {
    return $this->hasMany(Chapter::class)->orderBy('chapter_number');
    }

    // Novel punya banyak komentar
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Novel bisa difavoritkan banyak user
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
    public function reviews()
    {
    return $this->hasMany(Review::class);
    }
}
