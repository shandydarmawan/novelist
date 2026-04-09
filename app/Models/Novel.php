<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id', // tetap dipakai (opsional utama)
        'author_id',
        'cover',
        'synopsis',
        'content',
        'status',
        'views',
        'likes',
    ];

    /* ================= RELATIONS ================= */

    // 🔥 Lama (tetap ada)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // 🔥 BARU (multi genre)
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_novel');
    }

    // Author
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    // Chapters
    public function chapters()
    {
        return $this->hasMany(Chapter::class)->orderBy('chapter_number');
    }

    // Comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Favorites
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    // Reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}