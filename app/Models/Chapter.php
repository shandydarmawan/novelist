<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'novel_id',
        'chapter_number',
        'title',
        'content',
        'views',
    ];

    public function novel()
    {
        return $this->belongsTo(Novel::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
