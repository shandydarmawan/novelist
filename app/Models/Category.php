<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $category->slug = Str::slug($category->name);
        });

        static::updating(function ($category) {
            $category->slug = Str::slug($category->name);
        });
    }

    // 🔥 Lama (tetap)
    public function novels()
    {
        return $this->hasMany(Novel::class);
    }

    // 🔥 BARU (multi genre)
    public function novelsMany()
    {
        return $this->belongsToMany(Novel::class, 'category_novel');
    }
}